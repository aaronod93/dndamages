@if($character->user_id == $user->id)
<a href="/characters/edit/{{hash_encode($character->id)}}" class="btn btn-sm txt-theme">Edit&nbsp;<i class="fa fa-pencil-alt txt-theme"></i></a>
<a href="/characters/delete/{{hash_encode($character->id)}}" class="btn btn-sm txt-theme">Delete&nbsp;<i class="fa fa-trash txt-theme"></i></a>
@endif