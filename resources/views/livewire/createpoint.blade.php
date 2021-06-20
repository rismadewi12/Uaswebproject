<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">

            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="">

                        <div class="mb-4">

                            <label for="fornim" class="block text-gray-700 text-sm font-bold mb-2">NIM</label>

                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fornim" placeholder="Enter NIM" wire:model="nim">

                            @error('nim') <span class="text-red-500">{{ $message }}</span>@enderror

                        </div>

                        <div class="mb-4">

                            <label for="forthn_akademik" class="block text-gray-700 text-sm font-bold mb-2">Tahun Akademik</label>

                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forthn_akademik" placeholder="Enter Tahun Akademik" wire:model="thn_akademik">

                            @error('thn_akademik') <span class="text-red-500">{{ $message }}</span>@enderror

                        </div>

                        <div class="mb-4">

                            <label for="forkategori" class="block text-gray-700 text-sm font-bold mb-2 ">Kategori</label>

                            <select name="kategori" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="kategori">
                                <option value=" ">--Pilih--</option>
                                @foreach($kategoris as $kategori)
                                <option value="{{$kategori->kategori}}">{{$kategori->kategori}}</option>
                                @endforeach
                            </select>
                            </div>


                        <div class="mb-4">

                            <label for="forkegiatan" class="block text-gray-700 text-sm font-bold mb-2">Kegiatan</label>

                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="forkegiatan" placeholder="Enter Kegiatan" wire:model="kegiatan">

                            @error('kegiatan') <span class="text-red-500">{{ $message }}</span>@enderror

                        </div>

                        <div class="mb-4">

                        <label for="forpoint" class="block text-gray-700 text-sm font-bold mb-2 ">point</label>

                        <select name="point" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="point">
                            <option value=" ">--Pilih Point--</option>
                            @foreach($nilais as $point)
                            <option value="{{$point->nilai}}">{{$point->nilai}}</option>
                            @endforeach
                        </select>
                        </div>


                            <div class="mb-4">

                            <label for="forpembimbing" class="block text-gray-700 text-sm font-bold mb-2 ">Pembimbing Akademik</label>

                            <select name="pembimbing" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="pembimbing">
                                <option value=" ">--Pilih Pembimbing Akademik--</option>
                                @foreach($dosens as $pembimbing)
                                <option value="{{$pembimbing->nama}}">{{$pembimbing->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="mb-4">
                            <label for="forfile" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                            <input type="file"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="forfile" name="bukti" placeholder="Enter File" wire:model="file">
            
                            @error('file') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                        <i class="fas fa-save mr-2"></i> Save

                        </button>

                    </span>

                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                         Cancel

                        </button>

                    </span>

                </div>

            </form>

        </div>

    </div>

</div>