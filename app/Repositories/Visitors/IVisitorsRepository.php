<?php

namespace App\Repositories\Visitors;


interface IVisitorsRepository
{
    public function save(array $visitorArray): bool;
    public function getPaginatedVisitors(int $page, int $perPage): array;
    public function getAllVisitors(): array ;
}
