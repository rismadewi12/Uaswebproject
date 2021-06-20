<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">Data Dosen</h2>
</x-slot>
<div class="">
    <div class=" max-w-7xl mx-auto ...">
        <div class='bg-white overflow-hidden shadow-xl sm::rounded-lg px-4 py-4'>
            @if (session()->has('message'))
            <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md my-3">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message')}} </p>
                    </div>
                </div>
            </div>
            @endif
            <div class=" text-2xl font-bold ">
                <h1>Data Dosen</h1>
            </div>
          
            <div class="form-group col-span-2 p-2  bg-purple-100 border-t-2 border-purple-100- rounded-b text-purple-50 px-2 pt-2 shadow-md my-2 ">
            <button wire:click="createdosen()" class=" float-right bg-purple-500 hover:bg-purple-500 text-white font-bold py-1 px-1 rounded my-1">Tambah Data</button>
            @if ($isModal)
                @include("livewire.createdosen")
            @endif
            <input type="search" class="form-control rounded text-black  "  placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" wire:model="search">
            </div>

           

            
            <table class='table-fixed w-full text-white font-bold' style="#464866 border: 2px solid;">
            <thead>
                    <tr class="bg-gray-100" style="background-color:#464866; ">
                     <th class="px-1 py-1" style="border: 1px solid;">No</th>
                        <th class="px-1 py-1" style="border: 1px solid;">Nama</th>
                        <th class="px-1 py-1" style="border: 1px solid;">NIDN</th>
                        <th class="px-1 py-1" style="border: 1px solid;">Email</th>
                        <th class="px-1 py-1" style="border: 1px solid;">No.Telepon</th>
                        <th class="px-1 py-1" style="border: 1px solid;">Bidang Ilmu</th>
                        <th class="px-1 py-1" style="border: 1px solid;">Status</th>
                        <th class="px-1 py-1" style="border: 1px solid;">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1;?>
                    @forelse($dosens as $row)
                    <tr>
                        <td class="boder px-4 py-2 text-black " style=" solid;text-align:center;">{{ $no }}</td>
                        <td class="boder px-4 py-2 text-black " style=" solid;text-align:center;">{{ $row -> nama }}</td>
                        <td class="boder px-4 py-2 text-black " style=" solid;text-align:center;">{{ $row -> nidn }}</td>
                        <td class="boder px-4 py-2 text-black " style="solid;text-align:center;">{{ $row -> email }}</td>
                        <td class="boder px-4 py-2 text-black " style=" solid;text-align:center;">{{ $row -> telepon }}</td>
                        <td class="boder px-4 py-2 text-black " style=" solid;text-align:center;">{{ $row -> bidang }}</td>
                        <td class="boder px-4 py-2 text-black " style="solid;text-align:center;">{!! $row -> status_label !!}</td>
                        <td class="boder px-4 py-2 text-black " style="solid;text-align:center;">
                             <button wire:click="edit({{ $row -> id}})" class="bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-2 rounded"> 
                                <i class="fas fa-edit"></i></button>
                            <button wire:click="delete({{ $row -> id}})" class="bg-red-500 hover:bg-red-500 text-white font-bold py-2 px-2 rounded">
                                 <i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php $no++ ;?>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-black" colspan="5"> Tidak ada Data </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{$dosens -> links()}}
        </div>
    </div>
</div>