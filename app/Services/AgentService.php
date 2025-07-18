<?php

namespace App\Services;

use App\Models\Agent;

class AgentService
{
    public static function createAgent($data)
    {
        return Agent::create([
            'name' => $data['name'],
            'provider' => $data['provider'],
        ]);
    }

    public static function getAllAgents()
    {
        return Agent::all();
    }
}
