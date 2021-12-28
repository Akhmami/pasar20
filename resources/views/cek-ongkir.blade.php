@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Content goes here -->
        <form class="mt-20" action="{{ route('cek-ongkir') }}" method="GET">
            <div class="shadow sm:rounded-md">
                <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Cek Ongkir via Rajaongkir</h3>
                        <p class="mt-1 text-sm text-gray-500">Masukan kota asal dan kota tujuan untuk mendapatkan ongkos
                            kirim (layanan ini menggunakan akun starter rajaongkir.com, hanya tersedia 3 jasa
                            kurir).
                        </p>
                    </div>

                    <div class="grid grid-cols-6 gap-6">
                        <div class="sm:col-span-3">
                            <label for="origin" class="block text-sm font-medium text-gray-700">
                                Kota Asal
                            </label>
                            <div class="mt-1">
                                <select name="origin" autocomplete="origin"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Pilih Kota</option>
                                    @foreach ($dataKota as $kota)
                                    <option value="{{ $kota->id }}" {{ old('origin')==$kota->id ? 'selected' :
                                        ($kota->id == 501 ? 'selected' : '') }}>{{
                                        $kota->name . ', ' . $kota->province->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('origin')
                            <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="destination" class="block text-sm font-medium text-gray-700">
                                Kota Tujuan
                            </label>
                            <div class="mt-1">
                                <select name="destination" autocomplete="destination"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Pilih Kota</option>
                                    @foreach ($dataKota as $kota)
                                    <option value="{{ $kota->id }}" {{ old('destination')==$kota->id ? 'selected' : ''
                                        }}>{{
                                        $kota->name . ', ' . $kota->province->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('destination')
                            <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="weight" class="block text-sm font-medium text-gray-700">
                                Berat Barang
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="number" name="weight" autocomplete="weight" value="{{ old('weight') }}"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="1000" aria-describedby="price-currency">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm" id="price-currency">
                                        Gram
                                    </span>
                                </div>
                            </div>
                            @error('weight')
                            <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="courier" class="block text-sm font-medium text-gray-700">
                                Jasa Kurir
                            </label>
                            <div class="mt-1">
                                <select name="courier" autocomplete="courier"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Pilih Kurir</option>
                                    @foreach ($dataKurir as $key => $value)
                                    <option value="{{ $key }}" {{ old('courier')==$key ? 'selected' : '' }}>{{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('courier')
                            <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cek Sekarang
                    </button>
                </div>
            </div>
        </form>

        @if (!empty($ongkir))
        <div class="mb-20">
            <div class="font-semibold text-lg mt-10">Result:</div>
            <div>
                <p>Kurir: {{ $ongkir[0]['name'] }}</p>
                <div class="flex justify-start space-x-4">
                    <div>Kota Asal: {{ App\Models\City::find(request()->origin)->name ?? null }}</div>
                    <div>Kota Tujuan: {{ App\Models\City::find(request()->destination)->name ?? null }}</div>
                </div>
            </div>
            <div class="flow-root mt-6">
                <ul role="list" class="-my-5 divide-y divide-gray-200">
                    @foreach ($ongkir[0]['costs'] as $item)
                    <li>
                        <a href="#" class="block hover:bg-gray-50">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-indigo-600 truncate">
                                        {{ $item['description'] }} ({{ $item['service'] }})
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Rp {{ number_format($item['cost'][0]['value']) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Estimasi tiba {{ $item['cost'][0]['etd'] }} hari
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
