<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-950 px-4">
        
        <!-- Logo & Branding -->
        <div class="mb-8 text-center">
            <span class="px-4 py-1.5 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-full text-sm font-extrabold uppercase tracking-widest backdrop-blur-md">
                Penumpas Jukir Liar dan Pungli
            </span>
            <h2 class="text-5xl font-black text-white tracking-tight mt-4">Titip<span class="text-emerald-400">Keun</span>.</h2>
            <p class="text-slate-400 text-base mt-2">Solusi tertib parkir, bebas cemas, warga pun puas.</p>
        </div>

        <div class="w-full sm:max-w-md mt-2 px-6 py-8 bg-white/95 backdrop-blur-xl shadow-2xl sm:rounded-3xl border border-white/20">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Email Terdaftar</label>
                    <input id="email" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3 transition" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label class="block text-sm font-extrabold uppercase tracking-wider text-slate-600 mb-2">Kata Sandi</label>
                    <input id="password" class="w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 text-base py-3 transition" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between text-base">
                    <label for="remember_me" class="inline-flex items-center text-slate-600">
                        <input id="remember_me" type="checkbox" class="rounded-lg border-slate-300 w-5 h-5 text-emerald-600 shadow-sm focus:ring-emerald-500" name="remember">
                        <span class="ms-2 font-medium">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-emerald-600 hover:text-emerald-800 font-bold text-sm" href="{{ route('password.request') }}">
                            Lupa sandi?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full bg-slate-900 text-emerald-400 font-extrabold py-4 rounded-2xl shadow-xl hover:bg-slate-800 active:scale-[0.98] transition-all text-base tracking-wide border border-emerald-500/20">
                    Masuk
                </button>

                <div class="text-center pt-5 border-t border-slate-100">
                    <p class="text-sm text-slate-500">Belum punya akses akun warga?</p>
                    <a href="{{ route('register') }}" class="mt-1.5 inline-block font-extrabold text-emerald-600 hover:text-emerald-700 text-base">
                        Daftar Akun Baru &rarr;
                    </a>
                </div>
            </form>
        </div>
        
        <div class="mt-8 text-center text-sm text-slate-500">
            &copy; 2026 TitipKeun &bull; All rights reserved.
        </div>
    </div>
</x-guest-layout>