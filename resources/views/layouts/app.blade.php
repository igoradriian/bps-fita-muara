<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>@yield('title','LMS BPS') — BPS Kabupaten Muara Enim</title><link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"><link rel="stylesheet" href="{{ asset('assets/css/laravel.css') }}"></head><body>
<header class="topbar"><div class="logo">📊 <strong>LMS BPS</strong><small>KABUPATEN MUARA ENIM</small></div><div class="topright">{{ auth()->user()->name }} <form method="post" action="{{route('logout')}}">@csrf<button class="logout">Keluar</button></form></div></header>
<div class="shell"><aside class="sidebar">
<a class="{{request()->routeIs('dashboard')?'active':''}}" href="{{route('dashboard')}}">▦ &nbsp; Dashboard</a>
<a class="{{request()->routeIs('materi*')?'active':''}}" href="{{route('materi')}}">▣ &nbsp; Materi Pembelajaran</a>
<a class="{{request()->routeIs('absensi')?'active':''}}" href="{{route('absensi')}}">◉ &nbsp; Absensi</a>
<a class="{{request()->routeIs('riwayat')?'active':''}}" href="{{route('riwayat')}}">◷ &nbsp; Riwayat Absensi</a>
<a class="{{request()->routeIs('profil')?'active':''}}" href="{{route('profil')}}">♙ &nbsp; Profil Saya</a>
@if(auth()->user()->is_admin)<hr><a class="{{request()->routeIs('admin.*')?'active':''}}" href="{{route('admin.index')}}">⚙ &nbsp; Admin Panel</a>@endif
</aside><main class="main">@if(session('success'))<div class="flash success">{{session('success')}}</div>@endif @if($errors->any())<div class="flash error">{{implode(' ', $errors->all())}}</div>@endif @yield('content')<footer>LMS BPS Kabupaten Muara Enim • Halaman pembelajaran</footer></main></div></body></html>
