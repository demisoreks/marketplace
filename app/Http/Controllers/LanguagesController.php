<?php

namespace App\Http\Controllers;

use App\Core\Languages\ILanguage;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LanguagesController extends Controller
{

    private $_language;

    public function __construct(ILanguage $language)
    {
        $this->_language = $language;
    }

    public function index() {
        $active_languages = $this->_language->getLanguagesByActive(true);
        $disabled_languages = $this->_language->getLanguagesByActive(false);
        return view('admin.languages.index', compact('active_languages', 'disabled_languages'));
    }

    public function create() {
        return view('admin.languages.create');
    }

    public function store(Request $request) {
        $data = [
            'name' => $request->name
        ];
        $response = $this->_language->createLanguage($data);
        if (isset($response['data'])) {
            Log::info("Language was created - ".$request->name);

            return Redirect::route('languages.index')
                    ->with('success', Alert::format('Completed!', 'Language was created.'));
        } else {
            Log::info("Language was not created - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function edit(DLanguage $language) {
        return view('admin.languages.edit', compact('language'));
    }

    public function update(DLanguage $language, Request $request) {
        $data = [
            'name' => $request->name
        ];
        $response = $this->_language->updateLanguage($language, $data);
        if (isset($response['data'])) {
            Log::info("Language was updated - ".$request->name);

            return Redirect::route('languages.index')
                    ->with('success', Alert::format('Completed!', 'Language was updated.'));
        } else {
            Log::info("Language was not updated - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function disable(DLanguage $language) {
        $this->_language->disable($language);
        Log::info("Language was disabled - ".$language->name);

        return Redirect::route('languages.index')
                ->with('success', Alert::format('Completed!', 'Language was disabled.'));
    }

    public function enable(DLanguage $language) {
        $this->_language->enable($language);
        Log::info("Language was enabled - ".$language->name);

        return Redirect::route('languages.index')
                ->with('success', Alert::format('Completed!', 'Language was enabled.'));
    }

}
