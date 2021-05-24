<?php

namespace App\Http\Controllers;

use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\Core\Versions\IVersion;
use App\DVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VersionsController extends Controller
{

    private $_version;

    public function __construct(IVersion $version)
    {
        $this->_version = $version;
    }

    public function index() {
        $active_versions = $this->_version->getVersionsByActive(true);
        $disabled_versions = $this->_version->getVersionsByActive(false);
        return view('admin.versions.index', compact('active_versions', 'disabled_versions'));
    }

    public function create() {
        return view('admin.versions.create');
    }

    public function store(Request $request) {
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $response = $this->_version->createVersion($data);
        if (isset($response['data'])) {
            Log::info("Version was created - ".$request->name);

            return Redirect::route('versions.index')
                    ->with('success', Alert::format('Completed!', 'Version was created.'));
        } else {
            Log::info("Version was not created - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function edit(DVersion $version) {
        return view('admin.versions.edit', compact('version'));
    }

    public function update(DVersion $version, Request $request) {
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $response = $this->_version->updateVersion($version, $data);
        if (isset($response['data'])) {
            Log::info("Version was updated - ".$request->name);

            return Redirect::route('versions.index')
                    ->with('success', Alert::format('Completed!', 'Version was updated.'));
        } else {
            Log::info("Version was not updated - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function disable(DVersion $version) {
        $this->_version->disable($version);
        Log::info("Version was disabled - ".$version->name);

        return Redirect::route('versions.index')
                ->with('success', Alert::format('Completed!', 'Version was disabled.'));
    }

    public function enable(DVersion $version) {
        $this->_version->enable($version);
        Log::info("Version was enabled - ".$version->name);

        return Redirect::route('versions.index')
                ->with('success', Alert::format('Completed!', 'Version was enabled.'));
    }

}
