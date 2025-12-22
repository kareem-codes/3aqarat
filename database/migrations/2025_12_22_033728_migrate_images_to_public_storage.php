<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Move project images from private to public storage
        $projects = DB::table('projects')->whereNotNull('images')->get();
        foreach ($projects as $project) {
            $images = json_decode($project->images, true);
            if (is_array($images)) {
                $newImages = [];
                foreach ($images as $image) {
                    $filename = basename($image);
                    $sourcePath = $filename; // local disk already points to storage/app/private
                    $destPath = 'projects/' . $filename;

                    if (Storage::disk('local')->exists($sourcePath)) {
                        $contents = Storage::disk('local')->get($sourcePath);
                        Storage::disk('public')->put($destPath, $contents);
                    }
                    $newImages[] = $destPath;
                }
                DB::table('projects')
                    ->where('id', $project->id)
                    ->update(['images' => json_encode($newImages)]);
            }
        }

        // Move property images from private to public storage
        $properties = DB::table('properties')->whereNotNull('images')->get();
        foreach ($properties as $property) {
            $images = json_decode($property->images, true);
            if (is_array($images)) {
                $newImages = [];
                foreach ($images as $image) {
                    $filename = basename($image);
                    $sourcePath = $filename; // local disk already points to storage/app/private
                    $destPath = 'properties/' . $filename;

                    if (Storage::disk('local')->exists($sourcePath)) {
                        $contents = Storage::disk('local')->get($sourcePath);
                        Storage::disk('public')->put($destPath, $contents);
                    }
                    $newImages[] = $destPath;
                }
                DB::table('properties')
                    ->where('id', $property->id)
                    ->update(['images' => json_encode($newImages)]);
            }
        }

        // Move agent images from private to public storage
        $agents = DB::table('agents')->whereNotNull('image')->get();
        foreach ($agents as $agent) {
            if ($agent->image) {
                $filename = basename($agent->image);
                $sourcePath = $filename; // local disk already points to storage/app/private
                $destPath = 'agents/' . $filename;

                if (Storage::disk('local')->exists($sourcePath)) {
                    $contents = Storage::disk('local')->get($sourcePath);
                    Storage::disk('public')->put($destPath, $contents);
                }
                DB::table('agents')
                    ->where('id', $agent->id)
                    ->update(['image' => $destPath]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Move project images back to private storage
        $projects = DB::table('projects')->whereNotNull('images')->get();
        foreach ($projects as $project) {
            $images = json_decode($project->images, true);
            if (is_array($images)) {
                $newImages = [];
                foreach ($images as $image) {
                    $filename = basename($image);
                    $sourcePath = 'projects/' . $filename;
                    $destPath = $filename; // local disk already points to storage/app/private

                    if (Storage::disk('public')->exists($sourcePath)) {
                        $contents = Storage::disk('public')->get($sourcePath);
                        Storage::disk('local')->put($destPath, $contents);
                    }
                    $newImages[] = $filename;
                }
                DB::table('projects')
                    ->where('id', $project->id)
                    ->update(['images' => json_encode($newImages)]);
            }
        }

        // Move property images back to private storage
        $properties = DB::table('properties')->whereNotNull('images')->get();
        foreach ($properties as $property) {
            $images = json_decode($property->images, true);
            if (is_array($images)) {
                $newImages = [];
                foreach ($images as $image) {
                    $filename = basename($image);
                    $sourcePath = 'properties/' . $filename;
                    $destPath = $filename; // local disk already points to storage/app/private

                    if (Storage::disk('public')->exists($sourcePath)) {
                        $contents = Storage::disk('public')->get($sourcePath);
                        Storage::disk('local')->put($destPath, $contents);
                    }
                    $newImages[] = $filename;
                }
                DB::table('properties')
                    ->where('id', $property->id)
                    ->update(['images' => json_encode($newImages)]);
            }
        }

        // Move agent images back to private storage
        $agents = DB::table('agents')->whereNotNull('image')->get();
        foreach ($agents as $agent) {
            if ($agent->image) {
                $filename = basename($agent->image);
                $sourcePath = 'agents/' . $filename;
                $destPath = $filename; // local disk already points to storage/app/private

                if (Storage::disk('public')->exists($sourcePath)) {
                    $contents = Storage::disk('public')->get($sourcePath);
                    Storage::disk('local')->put($destPath, $contents);
                }
                DB::table('agents')
                    ->where('id', $agent->id)
                    ->update(['image' => $filename]);
            }
        }
    }
};
