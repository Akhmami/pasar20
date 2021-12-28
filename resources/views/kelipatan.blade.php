@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl mx-auto">
        <!-- Content goes here -->
        <form class="mt-20" action="{{ route('kelipatan') }}" method="GET">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Kelipatan</h3>
                        <p class="mt-1 text-sm text-gray-500">Masukan nilai maksimal untuk mendapatkan kelipatan 3 dan
                            5.</p>
                    </div>

                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="maksimal" class="block text-sm font-medium text-gray-700">Nilai Maksimal</label>
                            <input type="number" name="maksimal" autocomplete="maksimal"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Lihat hasil
                    </button>
                </div>
            </div>
        </form>

        @if (!empty($result))
        <div>
            <div class="font-semibold text-lg mt-10">Result:</div>
            <div class="flex justify-between text-sm">
                <div>Jml Pasar 20 Belanja Pangan: <span>{{ $pbp2 }}</span></div>
            </div>
            <div class="flow-root mt-6">
                <ul role="list" class="-my-5 divide-y divide-gray-200">
                    @foreach ($result as $item)
                    <li class="py-5">
                        <h3 class="text-sm font-semibold text-gray-800">
                            {{ $item }}
                        </h3>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
