<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\OpenFunction\webInfo;
use App\webOurTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurTeam extends Controller
{
    public function index() {
        $result = webInfo::webInformation('all');
        $team = webOurTeam::all();
        return view('home.our-team.index')->with('info',$result)->with('team',$team);
    }
}
