<x-guest-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Faculty Members' }}</x-slot>

    <div class="it-feature-area grey-bg it-feature-2-style pt-120 pb-120">
        <div class="container">
            <div class="row">
                @foreach ($faculty_members as $faculty_member)
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">

                                @if ($faculty_member->profile_image)
                                    <img src="/images/users/{{ $faculty_member->profile_image }}" class="rounded-circle avatar-lg img-thumbnail" alt="image">
                                @else
                                    <img src="{{ asset('assets/images/avator.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="image">
                                @endif
                                <h4 class="text-muted mb-0 mt-2">{{ $faculty_member->name ?? ""}}</h4>
                                <p class="mb-0">{{ $faculty_member->position ?? "" }}</p>
                                <hr>
                                <p class="text-muted font-14 mb-0">{{ $faculty_member->mobile_number ?? ""}}</p>
                                <p class="text-muted font-14">{{ $faculty_member->email ?? "" }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-guest-layout>
