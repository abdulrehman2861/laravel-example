@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@section('content')
<div class="c-body">

    <main class="c-main">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Color Settings</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.setting.general.update') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="inshop">In Shop Color <span
                                                    class="text-danger">*</span></label>
                                            <input type="color" name="inshop"
                                                value="{{ $setting->inshop ?? '#1976cc' }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile Color <span
                                                    class="text-danger">*</span></label>
                                            <input type="color" name="mobile"
                                                value="{{ $setting->mobile ?? '#36d95e' }}" required="">
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">General Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="company_name">Company Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_name"
                                                value="{{ $setting->company_name ?? '' }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="company_email">Company Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_email"
                                                value="{{ $setting->company_email ?? '' }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="company_phone">Company Phone <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_phone"
                                                value="{{ $setting->company_phone ?? '' }}" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="default_currency_id">Default Currency <span
                                                    class="text-danger">*</span></label>
                                            <select name="default_currency_id" id="default_currency_id"
                                                class="form-control" required="">
                                                @forelse ($currencies as $currency)
                                                    <option value="{{ $currency->id }}"
                                                        @if ($currency->id == ($setting->default_currency_id ?? 0)) selected="true" @endif>
                                                        {{ $currency->name }}
                                                    </option>
                                                @empty
                                                    <option selected="true" disabled>
                                                        No Data Available
                                                    </option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="default_currency_position">Default Currency Position <span
                                                    class="text-danger">*</span></label>
                                            <select name="default_currency_position" id="default_currency_position"
                                                class="form-control" required="">
                                                <option value="prefix" @if ('prefix' == ($setting->default_currency_position ?? '')) selected="true" @endif >Prefix</option>
                                                <option value="suffix" @if ('suffix' == ($setting->default_currency_position ?? '')) selected="true" @endif >Suffix</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-none">
                                        <div class="form-group">
                                            <label for="notification_email">Notification Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="notification_email"
                                            value="{{ $setting->notification_email ?? 'info@autoglass.com' }}" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="company_address">Company Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_address"
                                            value="{{ $setting->company_address ?? 'Autoglass' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none">
                                        <div class="form-group">
                                            <label for="footer_text">Footer Text <span
                                                    class="text-danger">*</span></label>
                                            <textarea rows="1" name="footer_text" class="form-control">{{ $setting->footer_text ?? 'Auto Glass' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i> Save
                                        Changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Mail Settings</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dashboard.setting.smtp.update') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="mail_mailer">MAIL_DRIVER <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="mail_driver"
                                                value="{{ $smtpSetting->mail_driver ?? '' }}" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="mail_host">MAIL_HOST <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="mail_host"
                                                value="{{ $smtpSetting->mail_host ?? '' }}" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="mail_port">MAIL_PORT <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="mail_port"
                                                value="{{ $smtpSetting->mail_port ?? '' }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        {{-- <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="mail_mailer">MAIL_MAILER</label>
                                                <input type="text" class="form-control" name="mail_mailer"
                                                    value="sendmail">
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="mail_username">MAIL_USERNAME</label>
                                                <input type="text" class="form-control" name="mail_username"
                                                value="{{ $smtpSetting->mail_username ?? '' }}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="mail_password">MAIL_PASSWORD</label>
                                                <input type="password" class="form-control" name="mail_password"
                                                value="{{ $smtpSetting->mail_password ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="mail_encryption">MAIL_ENCRYPTION</label>
                                                <input type="text" class="form-control" name="mail_encryption"
                                                value="{{ $smtpSetting->mail_encryption ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="mail_from_address">MAIL_FROM_ADDRESS</label>
                                                <input type="email" class="form-control" name="mail_from_address"
                                                value="{{ $smtpSetting->mail_from_address ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="mail_from_name">MAIL_FROM_NAME <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="mail_from_name"
                                                value="{{ $smtpSetting->mail_from_name ?? '' }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                                            Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Shipping Settings</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dashboard.setting.shipping.update') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="mail_mailer">Shipping Rate <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="shipping_rate"
                                                value="{{ $setting->shipping_rate ?? 0 }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                                            Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    {{-- UPS Settings --}}
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">UPS Settings</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dashboard.setting.upsUpdate') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="user_id">User Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="user_id"
                                                value="{{ $upsSetting->user_id ?? '' }}" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="password">Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="password"
                                                value="{{ $upsSetting->password ?? '' }}" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="client_id">Client ID <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="client_id"
                                                value="{{ $upsSetting->client_id ?? '' }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="client_secret">Client Secret</label>
                                                <input type="text" class="form-control" name="client_secret"
                                                    value="{{ $upsSetting->client_secret ?? '' }}"  required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="account_number">Account Number</label>
                                                <input type="text" class="form-control" name="account_number"
                                                value="{{ $upsSetting->account_number ?? '' }}"  required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="ship_from_addressLine">Address</label>
                                                <input type="text" class="form-control" name="ship_from_addressLine"
                                                value="{{ $upsSetting->ship_from_addressLine ?? '' }}"  required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ship_from_city">City</label>
                                                <input type="text" class="form-control" name="ship_from_city"
                                                value="{{ $upsSetting->ship_from_city ?? '' }}"  required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ship_from_state">State</label>
                                                <input type="text" class="form-control" name="ship_from_state"
                                                value="{{ $upsSetting->ship_from_state ?? '' }}"  required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ship_from_postalCode">Postal Code</label>
                                                <input type="text" class="form-control" name="ship_from_postalCode"
                                                value="{{ $upsSetting->ship_from_postalCode ?? '' }}"  required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ship_from_countryCode">Country</label>
                                                <input type="text" class="form-control" name="ship_from_countryCode"
                                                value="{{ $upsSetting->ship_from_countryCode ?? '' }}"  required="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="is_live">Mode <span class="text-danger">*</span></label>
                                                <select name="is_live" id="mode"
                                                    class="form-control" required="">
                                                    <option value="1" @if ($upsSetting->is_live) ? selected="true" @endif >Live</option>
                                                    <option value="0" @if (!$upsSetting->is_live) ? selected="true" @endif >Test</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="is_active">Active <span class="text-danger">*</span></label>
                                                <select name="is_active" id="mode"
                                                    class="form-control" required="">
                                                    <option value="1" @if ($upsSetting->is_active) ? selected="true" @endif >Active</option>
                                                    <option value="0" @if (!$upsSetting->is_active) ? selected="true" @endif >In-active</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                                            Save Changes</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                    </div>

                    {{-- FedEx Settings --}}
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">FedEx Settings</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dashboard.setting.fedexUpdate') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="account_number">Account Number</label>
                                                <input type="text" class="form-control" name="account_number"
                                                value="{{ $fedexSetting->account_number ?? '' }}"  required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="password">Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="password"
                                                value="{{ $fedexSetting->password ?? '' }}" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="meter_number">Meter Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="meter_number"
                                                value="{{ $fedexSetting->meter_number ?? '' }}" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="key">Key</label>
                                                <input type="text" class="form-control" name="key"
                                                    value="{{ $fedexSetting->key ?? '' }}"  required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="ship_from_addressLine">Address</label>
                                                <input type="text" class="form-control" name="ship_from_addressLine"
                                                value="{{ $fedexSetting->ship_from_addressLine ?? '' }}"  required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ship_from_city">City</label>
                                                <input type="text" class="form-control" name="ship_from_city"
                                                value="{{ $fedexSetting->ship_from_city ?? '' }}"  required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ship_from_state">State</label>
                                                <input type="text" class="form-control" name="ship_from_state"
                                                value="{{ $fedexSetting->ship_from_state ?? '' }}"  required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ship_from_postalCode">Postal Code</label>
                                                <input type="text" class="form-control" name="ship_from_postalCode"
                                                value="{{ $fedexSetting->ship_from_postalCode ?? '' }}"  required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="ship_from_countryCode">Country</label>
                                                <input type="text" class="form-control" name="ship_from_countryCode"
                                                value="{{ $fedexSetting->ship_from_countryCode ?? '' }}"  required="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="is_live">Mode <span class="text-danger">*</span></label>
                                                <select name="is_live" id="mode"
                                                    class="form-control" required="">
                                                    <option value="1" @if ($fedexSetting->is_live) ? selected="true" @endif >Live</option>
                                                    <option value="0" @if (!$fedexSetting->is_live) ? selected="true" @endif >Test</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="is_active">Active <span class="text-danger">*</span></label>
                                                <select name="is_active" id="mode"
                                                    class="form-control" required="">
                                                    <option value="1" @if ($fedexSetting->is_active) ? selected="true" @endif >Active</option>
                                                    <option value="0" @if (!$fedexSetting->is_active) ? selected="true" @endif >In-active</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                                            Save Changes</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                    </div>

                    {{-- Stripe Setting --}}
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Stripe Settings</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dashboard.setting.stripeUpdate') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="api_key">API Key</label>
                                                <input type="text" class="form-control" name="api_key"
                                                value="{{ $stripeSetting->api_key ?? '' }}"  required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="api_secret">API Secret<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="api_secret"
                                                value="{{ $stripeSetting->api_secret ?? '' }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="is_live">Mode <span class="text-danger">*</span></label>
                                                <select name="is_live" id="mode"
                                                    class="form-control" required="">
                                                    <option value="1" @if ($stripeSetting->is_live) ? selected="true" @endif >Live</option>
                                                    <option value="0" @if (!$stripeSetting->is_live) ? selected="true" @endif >Test</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="is_active">Active <span class="text-danger">*</span></label>
                                                <select name="is_active" id="mode"
                                                    class="form-control" required="">
                                                    <option value="1" @if ($stripeSetting->is_active) ? selected="true" @endif >Active</option>
                                                    <option value="0" @if (!$stripeSetting->is_active) ? selected="true" @endif >In-active</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                                            Save Changes</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                    </div>

                    {{-- Paypal Setting --}}
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Paypal Settings</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dashboard.setting.paypalUpdate') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="client_id">Client ID</label>
                                                <input type="text" class="form-control" name="client_id"
                                                value="{{ $paypalSetting->client_id ?? '' }}"  required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="api_secret">API Secret<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="api_secret"
                                                value="{{ $paypalSetting->api_secret ?? '' }}" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="is_live">Mode <span class="text-danger">*</span></label>
                                                <select name="is_live" id="mode"
                                                    class="form-control" required="">
                                                    <option value="1" @if ($paypalSetting->is_live) ? selected="true" @endif >Live</option>
                                                    <option value="0" @if (!$paypalSetting->is_live) ? selected="true" @endif >Test</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="is_active">Active <span class="text-danger">*</span></label>
                                                <select name="is_active" id="mode"
                                                    class="form-control" required="">
                                                    <option value="1" @if ($paypalSetting->is_active) ? selected="true" @endif >Active</option>
                                                    <option value="0" @if (!$paypalSetting->is_active) ? selected="true" @endif >In-active</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                                            Save Changes</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </main>

</div>
@endsection
@push('scripts')
{{-- <script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script> --}}
@endpush
