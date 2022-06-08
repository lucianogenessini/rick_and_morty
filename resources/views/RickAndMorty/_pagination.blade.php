<form action="{{ route('rick_and_morty.index') }}" method="GET">
    <div class="col">
        <div class="mx-sm-3">
            <input name= "search" value="{{ request()->input('search') }}"  hidden>
            @if (isset($info['prev']))
            <button class="btn btn-outline-info" name= "page" value="{{$info['prev']}}" type="submit">Prev</button>  
            @endif
            @if (isset($info['next']))
                <button class="btn btn-outline-info" name="page" value="{{$info['next']}}" type="submit">Next</button>
            @endif
        </div>
    </div>
</form>

