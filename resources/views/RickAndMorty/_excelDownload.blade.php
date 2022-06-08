<form action="{{ route('rick_and_morty.download') }}" method="GET">
    <div class="col">
        <div class="mx-sm-3">
            <input name= "search" value="{{ request()->input('search') }}"  hidden>  
                <button class="btn btn-outline-info" name="download" type="submit">Download All Data</button>
        </div>
    </div>
</form>