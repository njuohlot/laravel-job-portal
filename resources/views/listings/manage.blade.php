<x-layout>
    <x-card>
      <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Manage Your Gigs
        </h1>
      </header>
  
      <table class="w-full table-auto rounded-sm">
        <tbody>
          @unless($listings->isEmpty())
          @foreach($listings as $listing)
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/listings/{{$listing->id}}"> {{$listing->title}} </a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <a href="/listings/edit/{{$listing->id}}">
                    <i class="fa-solid fa-pencil"></i> Edit
                  </a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <form method="POST" action="/listings/delete/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                  </form>
            </td>
          </tr>
          @endforeach
          @else
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <p class="text-center">No Listings Found</p>
            </td>
          </tr>
          @endunless
  
        </tbody>
      </table>
    </x-card>
  </x-layout>