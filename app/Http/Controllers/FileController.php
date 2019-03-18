<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
    public function list() {


        //
        $list = DB::table('file')->get()->toArray();
        return view('file.list', [
            'list' => $list
        ]);
    }

    public function detail() {

        return view('file.detail');
    }

    public function upload(Request $request) {
        $file = $request->file('myfile');
        if ($file->isValid()) {
            // 文件扩展名
            $extension = $file->getClientOriginalExtension();
            // 文件名
            $fileName = $file->getClientOriginalName();
            // 生成新的统一格式的文件名
            $newFileName = md5($fileName . time() . mt_rand(1, 10000)) . '.' . $extension;
            // 图片保存路径
            $savePath = 'images/' . $newFileName;
            // Web 访问路径
            $webPath = '/storage/' . $savePath;
            // 将文件保存到本地 storage/app/public/images 目录下，先判断同名文件是否已经存在，如果存在直接返回
//            if (Storage::disk('public')->has($savePath)) {
//                return response()->json(['path' => $webPath, 'file' => 'has']);
//            }
            // 否则执行保存操作，保存成功将访问路径返回给调用方
            if (!$file->storePubliclyAs('images', $newFileName, ['disk' => 'public'])) {
                return response()->json([
                    'code' => 500,
                    'msg' => '保存失败',
                ]);
            }
            // $webPath 文件地址
            $res = DB::table('file')->insert([
                'file_name' => $fileName,
                'file_path' => $newFileName,
                'storage_time' => date("Y-m-d H:i:s"),
                'status' => 1,
            ]);
            if ($res) {
                return response()->json([
                    'code' => 200,
                    'msg' => '添加成功',
                ]);
            } else {
                return response()->json([
                    'code' => 500,
                    'msg' => '添加失败',
                ]);
            }
        } else {
            return response()->json([
                'code' => 500,
                'msg' => '图片不存在',
            ]);
        }
    }
}
