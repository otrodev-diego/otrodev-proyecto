@extends('layouts.main')

@section('content')

<div class="kt-container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
         <div class="flex flex-col justify-center gap-2">
              <h1 class="text-xl font-medium leading-none text-mono">
                   Crear Rol
              </h1>
              <div class="flex items-center gap-2 text-sm font-normal text-secondary-foreground">
                   Central Hub for Personal Customization
              </div>
         </div>
    </div>
</div>

<div class="kt-container-fixed">
    <!-- begin: grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5">
         <div class="col-span-2">
              <div class="flex flex-col gap-5 lg:gap-7.5">
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">Nuevo Rol</h3>
                        </div>
                
                        <div class="kt-card-content grid gap-5">
                            {{-- Nombre del Rol --}}
                            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                <label for="role-name" class="kt-form-label max-w-32 w-full">
                                    Nombre del Rol
                                </label>
                                <div class="grow min-w-48">
                                    <input
                                        type="text"
                                        id="role-name"
                                        name="name"
                                        class="kt-input w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary @error('name') border-red-500 @enderror"
                                        placeholder="Nombre del rol..."
                                        value="{{ old('name') }}"
                                        required
                                    />
                                    @error('name')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                
                            {{-- Descripción --}}
                            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                <label for="role-description" class="kt-form-label max-w-32 w-full">
                                    Descripción
                                </label>
                                <div class="grow min-w-48">
                                    <textarea
                                        id="role-description"
                                        name="description"
                                        class="kt-textarea w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                                        placeholder="Descripción del rol..."
                                        rows="4"
                                        required
                                    >{{ old('description') }}</textarea>
                                </div>
                            </div>
                            

                
                            {{-- Permisos (Descomentar si los necesitas) --}}
                            {{-- 
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Permisos</label>
                                <div class="space-y-2">
                                    {{-- 
                                    @foreach ($permissions as $permission)
                                        <label class="flex items-center gap-2">
                                            <input
                                                type="checkbox"
                                                name="permission[{{ $permission->id }}]"
                                                value="{{ $permission->id }}"
                                                class="form-checkbox text-primary"
                                            />
                                            <span>{{ $permission->name }}</span>
                                        </label>
                                    @endforeach 
                                    
                                </div>
                            </div>
                            --}}
                        </div>
                
                        <div class="kt-card-footer flex justify-end gap-4">
                            <a href="{{ route('roles.index') }}" class="kt-btn kt-btn-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="kt-btn kt-btn-primary">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
                
                   
              </div>
         </div>
         <div class="col-span-1">
              <div class="flex flex-col gap-5 lg:gap-7.5">
                   <div class="kt-card">
                        <div class="kt-card-content py-10 flex flex-col gap-5 lg:gap-7.5">
                             <div class="flex flex-col items-start gap-2.5">
                                  <div class="mb-2.5">
                                       <div class="relative size-[50px] shrink-0">
                                            <svg class="w-full h-full stroke-primary/10 fill-primary-soft"
                                                 fill="none" height="48" viewbox="0 0 44 48"
                                                 width="44" xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 
18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 
39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                      fill="">
                                                 </path>
                                                 <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 
18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 
39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                      stroke="">
                                                 </path>
                                            </svg>
                                            <div
                                                 class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                 <i
                                                      class="ki-filled ki-users text-xl ps-px text-primary">
                                                 </i>
                                            </div>
                                       </div>
                                  </div>
                                  <a class="text-base font-semibold text-mono hover:text-primary"
                                       href="#">
                                       Expand Your Network: Seamless Friend Invitation System
                                  </a>
                                  <p class="text-sm text-secondary-foreground">
                                       Invite colleagues to join and collaborate with ease using
                                       our streamlined invitation process. Share the experience and
                                       grow your professional network effortlessly.
                                  </p>
                                  <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                       Learn more
                                  </a>
                             </div>
                             <span class="hidden not-last:block not-last:border-b border-b-border">
                             </span>
                             <div class="flex flex-col items-start gap-2.5">
                                  <div class="mb-2.5">
                                       <div class="relative size-[50px] shrink-0">
                                            <svg class="w-full h-full stroke-primary/10 fill-primary-soft"
                                                 fill="none" height="48" viewbox="0 0 44 48"
                                                 width="44" xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 
18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 
39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                      fill="">
                                                 </path>
                                                 <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 
18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 
39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                      stroke="">
                                                 </path>
                                            </svg>
                                            <div
                                                 class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                 <i
                                                      class="ki-filled ki-message-add text-xl ps-px text-primary">
                                                 </i>
                                            </div>
                                       </div>
                                  </div>
                                  <a class="text-base font-semibold text-mono hover:text-primary"
                                       href="#">
                                       Collaboration Growth: Refer Peers with Custom Invites
                                  </a>
                                  <p class="text-sm text-secondary-foreground">
                                       Enhance your team's capabilities by inviting peers directly
                                       through personalized invitations. Strengthen your projects
                                       by collaborating with trusted professionals.
                                  </p>
                                  <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                       Learn more
                                  </a>
                             </div>
                             <span class="hidden not-last:block not-last:border-b border-b-border">
                             </span>
                             <div class="flex flex-col items-start gap-2.5">
                                  <div class="mb-2.5">
                                       <div class="relative size-[50px] shrink-0">
                                            <svg class="w-full h-full stroke-primary/10 fill-primary-soft"
                                                 fill="none" height="48" viewbox="0 0 44 48"
                                                 width="44" xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 
18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 
39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                      fill="">
                                                 </path>
                                                 <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 
18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 
39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                      stroke="">
                                                 </path>
                                            </svg>
                                            <div
                                                 class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                 <i
                                                      class="ki-filled ki-address-book text-xl ps-px text-primary">
                                                 </i>
                                            </div>
                                       </div>
                                  </div>
                                  <a class="text-base font-semibold text-mono hover:text-primary"
                                       href="#">
                                       Team Building: Easy Referral of Professional Contacts
                                  </a>
                                  <p class="text-sm text-secondary-foreground">
                                       Strengthen your team's dynamics by inviting industry friends
                                       to collaborate. Use our intuitive referral system to bring
                                       in expertise and foster collaboration.
                                  </p>
                                  <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                       Learn more
                                  </a>
                             </div>
                             <span class="hidden not-last:block not-last:border-b border-b-border">
                             </span>
                        </div>s
                   </div>
              </div>
         </div>
    </div>
    <!-- end: grid -->
</div>
@endsection
