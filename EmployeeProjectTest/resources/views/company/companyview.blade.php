
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col text-center text-primary">
        <h4>Companies</h4>
    </div>
</div>
    <x-data-table
        id="users-table"
        :ajaxUrl="'http://localhost/EmployeeProjectTest/public/api/companylist'"
        :columns="[
            ['data' => 'id', 'name' => 'ID'],
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'email', 'name' => 'email'],
            ['data' => 'website', 'name' => 'website'],
            ['data' => 'created_at', 'name' => 'Created At'],
            ['data' => 'image', 'name' => 'image', 'orderable' => false, 'searchable' => false],
            ['data' => 'action', 'name' => 'action', 'orderable' => false, 'searchable' => false],
            ['data' => 'action1', 'name' => 'action1', 'orderable' => false, 'searchable' => false],

        ]"
    >
        <x-slot name="header">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>website</th>
                <th>Created At</th>
                <th>Logo</th>
                <th>Action</th>
                <th></th>
        </x-slot>
    </x-data-table>
@endsection




