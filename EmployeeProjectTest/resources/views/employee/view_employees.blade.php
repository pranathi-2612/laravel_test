
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col text-center text-primary">
        <h4>Employees</h4>
    </div>
</div>
    <x-data-table
        id="users-table"
        :ajaxUrl="'http://localhost/EmployeeProjectTest/public/api/employeelist'"
        :columns="[
            ['data' => 'id', 'name' => 'ID'],
            ['data' => 'first_name', 'name' => 'first_name'],
            ['data' => 'last_name', 'name' => 'last_name'],
            ['data' => 'cname', 'name' => 'cname'],
            ['data' => 'email', 'name' => 'email'],
            ['data' => 'phone', 'name' => 'phone'],
            ['data' => 'created_at', 'name' => 'Created At'],
            ['data' => 'action', 'name' => 'Action', 'orderable' => false, 'searchable' => false],
            ['data' => 'action2', 'name' => 'Action2', 'orderable' => false, 'searchable' => false],

        ]"
    >
        <x-slot name="header">
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Created At</th>
            <th>Action</th>
            <th></th>
        </x-slot>
    </x-data-table>
@endsection


