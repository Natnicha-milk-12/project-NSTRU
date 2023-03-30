<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\AccidentImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AccidentsController extends Controller
{
    public function index()
    {
        $accidents = DB::table("accidents")->orderBy("accidents_date", "desc")->orderBy("accidents_time_start", "desc")->get();
        return view('Accidents.index_accidents', compact('accidents'));
        // return view('Categor.category_index', compact('ct'));
    }

    public function printaccidents()
    {
        $accidents = DB::table("accidents")->orderBy("accidents_date", "desc")->orderBy("accidents_time_start", "desc")->get();
        return view('Accidents.print_accidents', compact('accidents'));
        // return view('Categor.category_index', compact('ct'));
    }
    public function create()
    {
        $data = DB::table('categors')->where('status', 'เปิด')->get();
        $user = DB::table('users')->get();
        // return dd($user);
        return view('Accidents.form_accidents', compact('data', 'user'));
        // return view('Accidents.form_accidents');
    }

    public function storeaccidents(Request $request)
    {

        $acc = new Accident();
        $acc->accidents_name = $request->input('accidents_name');
        $acc->accidents_categors_name = $request->input('accidents_categors_name');
        $acc->location = $request->input('location');
        $acc->accidents_date = $request->input('accidents_date');
        $acc->accidents_time_start = $request->input('accidents_time_start');
        $acc->accidents_time_end = $request->input('accidents_time_end');
        $acc->details = $request->input('details');
        $acc->effect = $request->input('effect');
        $acc->solutions = $request->input('solutions');
        $acc->follower_name = $request->input('follower_name');
        $acc->save();

        // "accidents_name"=>$request->accidents_name,
        // "accidents_categors_name"=>$request->accidents_categors_name,
        // "location"=>$request->location,
        // "accidents_date"=>$request->accidents_date,
        // "accidents_time_start"=>$request->accidents_time_start,
        // "accidents_time_end"=>$request->accidents_time_end,
        // "details"=>$request->details,
        // "effect"=>$request->effect,
        // "solutions"=>$request->solutions,
        // "follower_name"=>$request->follower_name,
        // return redirect("Accidents.form_accidents");

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['accidents_id'] = $acc->id;
                $request['image'] = $imageName;
                $file->move(public_path("images"), $imageName);
                AccidentImages::create($request->all());

            }

        }
        // return redirect("Accidents.form_accidents");
        return redirect()->back()->with('status', 'accident Added Successfully');

    }

    public function edit($id)
    {
        $editaccident = DB::select("
SELECT
    *,
    accident_images.id as image_id
FROM
    accidents
    LEFT JOIN accident_images ON accident_images.accidents_id = accidents.id
WHERE
    accidents.id = :accidentsId",
            ["accidentsId" => $id]);
        // $editaccident = Accident::find($id);
        // echo json_encode($editaccident[0]->id);
        // return view('Accidents.edit_accidents')->with('editaccident', $editaccident);
        $data = DB::table('categors')->where('status', 'เปิด')->get();
        $user = DB::table('users')->get();
        // return dd($editaccident);

        return view('Accidents.edit_accidents', compact('editaccident', 'data', 'user'));
    }

    public function viewaccident($id)
    {
        $viewaccident = DB::select("
SELECT
    *,
    accident_images.id as image_id
FROM
    accidents
    LEFT JOIN accident_images ON accident_images.accidents_id = accidents.id
WHERE
    accidents.id = :accidentsId",
            ["accidentsId" => $id]);
        // $editaccident = Accident::find($id);
        // echo json_encode($viewaccident[0]->id);
        // return view('Accidents.edit_accidents')->with('editaccident', $editaccident);
        // return dd($user);

        return view('Accidents.view_accidents', compact('viewaccident'));
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $editaccidents = Accident::find($id);
        // $editaccidents->accidents_name = $request->input('accidents_name');
        // $editaccidents->accidents_categors_name = $request->input('accidents_categors_name');
        // $editaccidents->location = $request->input('location');
        // $editaccidents->accidents_date = $request->input('accidents_date');
        // $editaccidents->accidents_time_start = $request->input('accidents_time_start');
        // $editaccidents->accidents_time_en = $request->input('accidents_time_en');
        // $editaccidents->details = $request->input('details');
        // $editaccidents->effect = $request->input('effect');
        // $editaccidents->solutions = $request->input('solutions');
        // $editaccidents->follower_name = $request->input('follower_name');
        // $editaccidents->update();

        $editaccidents->update([
            "accidents_name" => $request->accidents_name,
            "accidents_categors_name" => $request->accidents_categors_name,
            "location" => $request->location,
            "accidents_date" => $request->accidents_date,
            "accidents_time_start" => $request->accidents_time_start,
            "accidents_time_end" => $request->accidents_time_end,
            "details" => $request->details,
            "effect" => $request->effect,
            "solutions" => $request->solutions,
            "follower_name" => $request->follower_name,

        ]);

        // $cg = Categor::find($id);
        // $cg->categors_name = $request->input('categors_name');
        // $cg->status = $request->input('status');
        // $cg->update();

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request["accidents_id"] = $editaccidents->id;
                $request["image"] = $imageName;
                $file->move(\public_path("images"), $imageName);
                AccidentImages::create($request->all());

            }
        }

        return redirect()->back()->with('status', 'accident edit Successfully');

    }
    public function destroy($id)
    {
        $posts = Accident::findOrFail($id);
        $images = AccidentImages::where("accidents_id", $posts->id)->get();
        foreach ($images as $image) {
            if (File::exists(public_path("images"), $image->image)) {
                File::delete(public_path("images"), $image->image);
            }
        }
        $posts->delete();
        return back();

    }

    public function deleteimage($id)
    {
        // echo "hi";
        // return;
        $imagess = AccidentImages::findOrFail($id);
        if (File::exists(public_path("images"), $imagess->image)) {
            File::delete(public_path("images"), $imagess->image);
        }

        AccidentImages::find($id)->delete();
        return back();
    }

    public function getaccident()
    {
        $getaccidentquery = DB::raw("
        WITH
        accidents_every_day AS (
            SELECT
                NULL AS accidents_day_ago,
                COUNT(*) AS accidents_count
            FROM
                accidents
        ),
        accidents_7_day_ago AS (
            SELECT
                '7' AS accidents_day_ago,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 7 DAY
        ),
        accidents_30_day_ago AS (
            SELECT
                '30' AS accidents_day_ago,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 30 DAY
        ),
        accidents_90_day_ago AS (
            SELECT
                '90' AS accidents_day_ago,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 90 DAY
        )
    SELECT
        *
    FROM
        accidents_every_day
    UNION
    SELECT
        *
    FROM
        accidents_7_day_ago
    UNION
    SELECT
        *
    FROM
        accidents_30_day_ago
    UNION
    SELECT
        *
    FROM
        accidents_90_day_ago
    ;
        ");

        $countaccidents = DB::select($getaccidentquery);

        $getchartaccidentquery = DB::raw("
        WITH
        accidents_every_day AS (
            SELECT
                NULL AS accidents_day_ago,
                accidents_categors_name,
                COUNT(*) AS accidents_count
            FROM
                accidents
            GROUP BY
                accidents_categors_name
        ),
        accidents_7_day_ago AS (
            SELECT
                '7' AS accidents_day_ago,
                accidents_categors_name,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 7 DAY
            GROUP BY
                accidents_categors_name
        ),
        accidents_30_day_ago AS (
            SELECT
                '30' AS accidents_day_ago,
                accidents_categors_name,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 30 DAY
            GROUP BY
                accidents_categors_name
        ),
        accidents_90_day_ago AS (
            SELECT
                '90' AS accidents_day_ago,
                accidents_categors_name,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 90 DAY
            GROUP BY
                accidents_categors_name
        )
    SELECT
        *
    FROM
        accidents_every_day
    UNION
    SELECT
        *
    FROM
        accidents_7_day_ago
    UNION
    SELECT
        *
    FROM
        accidents_30_day_ago
    UNION
    SELECT
        *
    FROM
        accidents_90_day_ago
    ;
        ");

        $accidentstats = DB::select($getchartaccidentquery);
        // $datacategors = DB::table('categors')->where('status', 'เปิด')->get();

        // $countaccidents = DB::table('accidents')->count();
        return view('home', compact('countaccidents', 'accidentstats'));
        // return view('/', compact('countaccidents', 'accidentstats'));
        // return dd($countaccidents, $getchart);

    }

    public function chartaccident()
    {

        $getaccidentquery = DB::raw("
        WITH
        accidents_every_day AS (
            SELECT
                NULL AS accidents_day_ago,
                COUNT(*) AS accidents_count
            FROM
                accidents
        ),
        accidents_7_day_ago AS (
            SELECT
                '7' AS accidents_day_ago,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 7 DAY
        ),
        accidents_30_day_ago AS (
            SELECT
                '30' AS accidents_day_ago,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 30 DAY
        ),
        accidents_90_day_ago AS (
            SELECT
                '90' AS accidents_day_ago,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 90 DAY
        )
    SELECT
        *
    FROM
        accidents_every_day
    UNION
    SELECT
        *
    FROM
        accidents_7_day_ago
    UNION
    SELECT
        *
    FROM
        accidents_30_day_ago
    UNION
    SELECT
        *
    FROM
        accidents_90_day_ago
    ;
        ");

        $countaccidents = DB::select($getaccidentquery);

        $getchartaccidentquery = DB::raw("
        WITH
        accidents_every_day AS (
            SELECT
                NULL AS accidents_day_ago,
                accidents_categors_name,
                COUNT(*) AS accidents_count
            FROM
                accidents
            GROUP BY
                accidents_categors_name
        ),
        accidents_7_day_ago AS (
            SELECT
                '7' AS accidents_day_ago,
                accidents_categors_name,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 7 DAY
            GROUP BY
                accidents_categors_name
        ),
        accidents_30_day_ago AS (
            SELECT
                '30' AS accidents_day_ago,
                accidents_categors_name,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 30 DAY
            GROUP BY
                accidents_categors_name
        ),
        accidents_90_day_ago AS (
            SELECT
                '90' AS accidents_day_ago,
                accidents_categors_name,
                COUNT(*) AS accidents_count
            FROM
                accidents
            WHERE
                accidents_date > NOW() - INTERVAL 90 DAY
            GROUP BY
                accidents_categors_name
        )
    SELECT
        *
    FROM
        accidents_every_day
    UNION
    SELECT
        *
    FROM
        accidents_7_day_ago
    UNION
    SELECT
        *
    FROM
        accidents_30_day_ago
    UNION
    SELECT
        *
    FROM
        accidents_90_day_ago
    ;
        ");

        $accidentstats = DB::select($getchartaccidentquery);

        // $countaccidents = DB::table('accidents')->count();
        // return view('home', compact('countaccidents', 'accidentstats'));
        return view('welcome', compact('countaccidents', 'accidentstats'));
        // return dd($countaccidents, $getchart);

    }

}
