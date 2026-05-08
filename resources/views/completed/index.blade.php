@extends('layouts.app')

@section('content')
 <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="bg-gray-50 p-6 font-sans">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Completed Task</h1>
    </div>
    <div class="border rounded-xl p-3">
        <div class="flex">
            <div class="w-[95%]">
                <h2>Recent Task</h2>
            </div>
            <div class="w-[4%] gap-10">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-filter"></i>
                
            </div>
        </div>
        <div class="border mt-2"></div>
        <div class="flex mt-3 justify-between">
            <div class="w-[30%]">haha</div>
            <div class="w-[15%]">haha</div>
            <div class="w-[15%]">haha</div>
            <div class="w-[15%]">haha</div>
            <div class="w-[25%]">haha</div>
        </div>
        

    </div>

  


</div>

@endsection