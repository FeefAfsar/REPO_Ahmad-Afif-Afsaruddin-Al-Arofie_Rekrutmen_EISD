<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-950 px-4">
        
        <div class="mb-8 text-center">
            <h2 class="text-4xl font-black text-white tracking-tight">Pendaftaran Warga</h2>
            <p class="text-slate-400 text-sm mt-2">Buat akun untuk mendapatkan kartu bebas parkir digital.</p>
        </div>

        <div class="w-full sm:max-w-md px-6 py-8 bg-white/95 backdrop-blur-xl shadow-2xl sm:rounded-3xl border border-white/20">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Nama Lengkap</label>
                    <input id="name" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 text-base py-3 focus:border-emerald-500 focus:ring-emerald-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="cth: Ahmad Afif" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div>
                    <label class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Alamat Email</label>
                    <input id="email" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 text-base py-3 focus:border-emerald-500 focus:ring-emerald-500" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div>
                    <label class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Kata Sandi</label>
                    <input id="password" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 text-base py-3 focus:border-emerald-500 focus:ring-emerald-500" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <div>
                    <label class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Konfirmasi Sandi</label>
                    <input id="password_confirmation" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 text-base py-3 focus:border-emerald-500 focus:ring-emerald-500" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <div class="pt-3">
                    <button type="submit" class="w-full bg-emerald-600 text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 active:scale-[0.98] transition-all text-base tracking-wide">
                        Daftar Sekarang
                    </button>
                </div>

                <div class="text-center pt-4">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-600 hover:text-slate-900 underline">
                        &larr; Sudah punya akun? Masuk di sini
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>