<x-main>

<h1> Manage Posts </h1>
<br>
    <h3><a href="{{route('showpostcreate')}}">Create</a>     <a href="{{route('blog')}}">Back</a></h3>
<div class="container  col-md-6">
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                       @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="{{route('getpostslug', $post->slug)}}">
                                               {{$post->title}}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{$post->category->name}}
                                 </td>
                                 <td>
                                    {{$post->author->username}}
                                 </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('editpost', $post->slug)}}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                    <form method="POST" action="{{route('deletepost', $post->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-xs text-gray-400">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
</div>
</x-main>
