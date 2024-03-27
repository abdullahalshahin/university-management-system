<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'System Settings |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> System Settings </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> System Settings </h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="notification_alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input. <br><br>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Email Gateway</h4>
                                <p class="text-muted font-14">An Email gateway is a website that allows users to send Email messages from a web browser to people within the cell served by that gateway.</p>
                                <form action="{{ url('admin-panel/dashboard/email-gateway-update') }}" method="POST" class="ml-3">
                                    @csrf

                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="mail_host"> MAIL HOST <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="mail_host" value="{{ old('mail_host', $email_gateway_data['mail_host'] ?? '') }}" id="mail_host" placeholder="" required>
                                        </div>

                                        <div class="mb-2 col-md-6">
                                            <label for="mail_port"> MAIL PORT <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="mail_port" value="{{ old('mail_port', $email_gateway_data['mail_port'] ?? '') }}" id="mail_port" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="mail_username"> MAIL USERNAME <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="mail_username" value="{{ old('mail_username', $email_gateway_data['mail_username'] ?? '') }}" id="mail_username" placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="mail_password">MAIL PASSWORD <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" name="mail_password" value="{{ old('mail_password', $email_gateway_data['mail_password'] ?? '') }}" id="mail_password" class="form-control" placeholder="Password" required>
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="mail_from_address"> MAIL FROM ADDRESS <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="mail_from_address" value="{{ old('mail_from_address', $email_gateway_data['mail_from_address'] ?? '') }}" id="mail_from_address" placeholder="" required>
                                        </div>

                                        <div class="mb-2 col-md-6">
                                            <h6 class="font-15">MAIL ENCRYPTION <span class="text-danger">*</span></h6>

                                            <div class="">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="mail_encryption" value="ssl" id="mail_encryption_ssl" class="form-check-input" {{ ($email_gateway_data['mail_encryption'] ?? "") == "ssl" ? "checked" : "" }}>
                                                    <label class="form-check-label" for="mail_encryption_ssl">SSL</label>
                                                </div>
                                            
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="mail_encryption" value="tls" id="mail_encryption_tls" class="form-check-input" {{ ($email_gateway_data['mail_encryption'] ?? "") == "tls" ? "checked" : "" }}>
                                                    <label class="form-check-label" for="mail_encryption_tls">TLS</label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success"> Save </button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="card-body">
                                <h4 class="header-title">System Cache Clear</h4>
                                <p class="text-muted font-14">Clearing the system cache can help to resolve issues and improve the performance of your application.</p>

                                <form action="{{ url('admin-panel/dashboard/application-cache-clear') }}" method="GET" class="ml-3">
                                    @csrf
                                    @method('GET')

                                    <button type="submit" class="btn btn-secondary rounded-pill">Clear Cache</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <x-slot name="script">
        <script type="text/javascript">
            $(document).ready(function() {
                $('#notification_alert').delay(3000).fadeOut('slow');
            });
        </script>
    </x-slot>
</x-app-layout>
