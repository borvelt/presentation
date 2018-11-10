@component('mail::panel')
{{$topic->title}} Removed.
@endcomponent

@component('mail::message')
# {{$topic->title}}

{{$topic->description}}

__Created at {{$topic->created_at}}__

@component('mail::button', ['url' => route('topic.show', ['id' => $topic->id], false)])
View Topic
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
