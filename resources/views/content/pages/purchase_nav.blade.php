@extends('layouts/layoutMaster')

@if ($request->user()->hasRole('procurement_manager'))
    @include('procurement_nav')
@elseif ($request->user()->hasRole('purchase_manager'))
    @include('purchase_nav')
@endif
