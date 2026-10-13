<?php
namespace App\Http\Controllers;

class AgentPropertyController extends SellerPropertyController
{
    protected function workspaceRole(): string { return 'agent'; }
}
