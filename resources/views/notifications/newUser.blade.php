<x-mail::message>
    # Introduction

    THANK YOU {{ $user->name }} FOR JOINING US AT {{config('app.name')}}!

    We are excited to have you on board and can't wait for you to start expl
    oring our platform. To get started, simply click the button below:
    <x-mail::button :url="route('feeds')">
        GO TO HOME PAGE
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>