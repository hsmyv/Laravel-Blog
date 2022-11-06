<x-main>
    <h1> Manage Posts </h1>
    <br>
  <h3> <a href="{{route('showpost')}}">Back</a></h3>
    <h1> Create: </h1>
    <div class="container col-md ">
                <form method="POST" action="{{route('adminpost')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <x-form.input name="title"/>
                        <x-form.input name="slug"/>
                        <x-form.textarea name="excerpt"/>
                        <x-form.input name="thumbnail" type="file"/>
                        <x-form.textarea name="body"/>

                       <x-form.field1>
                        <x-form.label name="category"/>
                        <select name="category_id" id="category_id">
                            @foreach(\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}"
                                {{old('category_id') == $category->id ? 'selected' : ''}}
                                >{{ucwords($category->name)}} </option>
                            @endforeach
                        </select>
                            <x-form.error name="category"/>
                       </x-form.field1>

                    </div>
                  <x-form.button>Publish</x-form.button>

                </form>
    </div>
</x-main>
