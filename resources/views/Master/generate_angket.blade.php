@extends('Template.app')
@section('title', 'Generate Angket')
@section('name-page', 'Generate Angket')
@section('css')
    <script src="{{ asset('assets/front-end-assets/js/angket.js') }}"></script>
@endsection
@section('content')
    <div class="card shadow p-3">
        <h3>Generate Link Angket</h3>
        <div class="form-group">
            <div class="unlink">
                <span>Alumni Tahun</span>
                <select name="text" id="generateAngket" class="form-control">
                    <option value="{{ date('Y', strtotime('-1 year')) }}">{{ date('Y', strtotime('-1 year')) }}</option>
                    <option value="{{ date('Y', strtotime('-2 year')) }}">{{ date('Y', strtotime('-2 year')) }}</option>
                    <option value="{{ date('Y', strtotime('-3 year')) }}">{{ date('Y', strtotime('-3 year')) }}</option>
                </select>
            </div>
            <div class="link d-none">
                <input type="text" class="form-control" id="generatedLink" readonly>
            </div>
        </div>
        <div class="form-group ms-auto btn-generate">
            <button class="btn btn-primary" onclick="generateAngket(event)">Generate Link</button>
        </div>
        <div class="form-group ms-auto d-none btn-copy">
            <button class="btn btn-outline-success" id="btnlink" onclick="copyLink(event)" >Copy Link</button>
        </div>
    </div>
@endsection
