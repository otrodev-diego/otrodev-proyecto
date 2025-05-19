@extends('layouts.main')

@section('content')
    <div class="kt-container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-medium leading-none text-mono">
                    Team Crew
                </h1>
                <div class="flex items-center flex-wrap gap-1.5 font-medium">
                    <span class="text-base text-secondary-foreground">
                        All Members:
                    </span>
                    <span class="text-base text-foreground font-medium me-2">
                        49,053
                    </span>
                    <span class="text-base text-secondary-foreground">
                        Pro Licenses
                    </span>
                    <span class="text-base text-foreground font-medium">
                        724
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2.5">
                <a class="kt-btn kt-btn-outline" href="#">
                    Import CSV
                </a>
                <a class="kt-btn kt-btn-primary" href="#">
                    Add Member
                </a>
            </div>
        </div>
    </div>
    <!-- End of Container -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="grid gap-5 lg:gap-7.5">
            <div class="kt-card kt-card-grid min-w-full">
                <div class="kt-card-header flex-wrap gap-2">
                    <h3 class="kt-card-title text-sm">
                        Showing 20 of 34 users
                    </h3>
                    <div class="flex flex-wrap gap-2 lg:gap-5">
                        <div class="flex">
                            <label class="kt-input">
                                <i class="ki-filled ki-magnifier">
                                </i>
                                <input data-kt-datatable-search="#team_crew_table" placeholder="Search users" type="text" />

                            </label>
                        </div>

                    </div>
                </div>
                <div class="kt-card-content">
                    <div data-kt-datatable="true" data-kt-datatable-state-save="false" id="team_crew_table">
                        <div class="kt-scrollable-x-auto">
                            <table class="kt-table table-auto kt-table-border" data-kt-datatable-table="true">
                                <thead>
                                    <tr>
                                        <th class="w-[60px] text-center">
                                            <input class="kt-checkbox kt-checkbox-sm" data-kt-datatable-check="true"
                                                type="checkbox" />
                                        </th>
                                        <th class="min-w-[300px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Member
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[180px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Role
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[180px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Status
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[180px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Location
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="min-w-[180px]">
                                            <span class="kt-table-col">
                                                <span class="kt-table-col-label">
                                                    Activity
                                                </span>
                                                <span class="kt-table-col-sort">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="w-[60px]">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    

                                    @foreach($users as $user)
                                    <tr>
                                        <td class="text-center">
                                            <input class="kt-checkbox kt-checkbox-sm" data-kt-datatable-row-check="true"
                                                type="checkbox" value="{{ $user->id }}" />
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <img alt="{{ $user->name }}" class="rounded-full size-9 shrink-0"
                                                    src="{{ $user->avatar ?? 'assets/media/avatars/300-1.png' }}">
                                                <div class="flex flex-col">
                                                    <a class="text-sm font-medium text-mono hover:text-primary mb-px"
                                                        href="#">
                                                        {{ $user->name }}
                                                    </a>
                                                    <a class="text-sm text-secondary-foreground font-normal hover:text-primary"
                                                        href="#">
                                                        {{ $user->email }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-foreground font-normal">
                                            {{ $user->role }}
                                        </td>
                                        <td>
                                            <span class="kt-badge kt-badge-destructive kt-badge-outline rounded-[30px]">
                                                <span class="kt-badge-dot size-1.5"></span>
                                                {{ $user->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="flex items-center text-foreground font-normal gap-1.5">
                                                <img alt="" class="rounded-full size-4 shrink-0"
                                                    src="{{ $user->flag ?? 'assets/media/flags/malaysia.svg' }}">
                                                {{ $user->country }}
                                            </div>
                                        </td>
                                        <td class="text-foreground font-normal">
                                           
                                        </td>
                                        <td class="text-center">
                                            <div class="kt-menu flex-inline" data-kt-menu="true">
                                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                    data-kt-menu-item-placement="bottom-end"
                                                    data-kt-menu-item-placement-rtl="bottom-start"
                                                    data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                    <button
                                                        class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                        <i class="ki-filled ki-dots-vertical text-lg"></i>
                                                    </button>
                                                    <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                                        data-kt-menu-dismiss="true">
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-search-list"></i>
                                                                </span>
                                                                <span class="kt-menu-title">Ver</span>
                                                            </a>
                                                        </div>
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-file-up"></i>
                                                                </span>
                                                                <span class="kt-menu-title">Exportar</span>
                                                            </a>
                                                        </div>
                                                        <div class="kt-menu-separator"></div>
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-pencil"></i>
                                                                </span>
                                                                <span class="kt-menu-title">Editar</span>
                                                            </a>
                                                        </div>
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-copy"></i>
                                                                </span>
                                                                <span class="kt-menu-title">Duplicar</span>
                                                            </a>
                                                        </div>
                                                        <div class="kt-menu-separator"></div>
                                                        <div class="kt-menu-item">
                                                            <a class="kt-menu-link" href="#">
                                                                <span class="kt-menu-icon">
                                                                    <i class="ki-filled ki-trash"></i>
                                                                </span>
                                                                <span class="kt-menu-title">Eliminar</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="kt-card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-secondary-foreground text-sm font-medium">
                            <div class="flex items-center gap-2 order-2 md:order-1">
                                Show
                                <select class="kt-select w-16" data-kt-datatable-size="true" name="perpage">
                                </select>
                                per page
                            </div>
                            <div class="flex items-center gap-4 order-1 md:order-2">
                                <span data-kt-datatable-info="true">
                                </span>
                                <div class="kt-datatable-pagination" data-kt-datatable-pagination="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-card">
                <div class="kt-card-header">
                    <h3 class="kt-card-title">
                        FAQ
                    </h3>
                </div>
                <div class="kt-card-content py-3">
                    <div data-kt-accordion="true" data-kt-accordion-expand-all="true">
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
                            <button aria-controls="faq_1_content" class="kt-accordion-toggle py-4"
                                data-kt-accordion-toggle="#faq_1_content">
                                <span class="text-base text-mono">
                                    How is pricing determined for each plan?
                                </span>
                                <span class="kt-accordion-active:hidden inline-flex">
                                    <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                    </i>
                                </span>
                                <span class="kt-accordion-active:inline-flex hidden">
                                    <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                    </i>
                                </span>
                            </button>
                            <div class="kt-accordion-content hidden" id="faq_1_content">
                                <div class="text-secondary-foreground text-base pb-4">
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision. Metronic embraces flexible licensing
                                    options that empower you to choose the perfect fit for your project's needs and budget.
                                    Understanding the factors influencing each plan's pricing helps you make an informed
                                    decision. Metronic embraces flexible licensing options that empower you to choose the
                                    perfect fit for your project's needs and budget. Understanding the factors influencing
                                    each plan's pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
                            <button aria-controls="faq_2_content" class="kt-accordion-toggle py-4"
                                data-kt-accordion-toggle="#faq_2_content">
                                <span class="text-base text-mono">
                                    What payment methods are accepted for subscriptions?
                                </span>
                                <span class="kt-accordion-active:hidden inline-flex">
                                    <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                    </i>
                                </span>
                                <span class="kt-accordion-active:inline-flex hidden">
                                    <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                    </i>
                                </span>
                            </button>
                            <div class="kt-accordion-content hidden" id="faq_2_content">
                                <div class="text-secondary-foreground text-base pb-4">
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
                            <button aria-controls="faq_3_content" class="kt-accordion-toggle py-4"
                                data-kt-accordion-toggle="#faq_3_content">
                                <span class="text-base text-mono">
                                    Are there any hidden fees in the pricing?
                                </span>
                                <span class="kt-accordion-active:hidden inline-flex">
                                    <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                    </i>
                                </span>
                                <span class="kt-accordion-active:inline-flex hidden">
                                    <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                    </i>
                                </span>
                            </button>
                            <div class="kt-accordion-content hidden" id="faq_3_content">
                                <div class="text-secondary-foreground text-base pb-4">
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
                            <button aria-controls="faq_4_content" class="kt-accordion-toggle py-4"
                                data-kt-accordion-toggle="#faq_4_content">
                                <span class="text-base text-mono">
                                    Is there a discount for annual subscriptions?
                                </span>
                                <span class="kt-accordion-active:hidden inline-flex">
                                    <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                    </i>
                                </span>
                                <span class="kt-accordion-active:inline-flex hidden">
                                    <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                    </i>
                                </span>
                            </button>
                            <div class="kt-accordion-content hidden" id="faq_4_content">
                                <div class="text-secondary-foreground text-base pb-4">
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
                            <button aria-controls="faq_5_content" class="kt-accordion-toggle py-4"
                                data-kt-accordion-toggle="#faq_5_content">
                                <span class="text-base text-mono">
                                    Do you offer refunds on subscription cancellations?
                                </span>
                                <span class="kt-accordion-active:hidden inline-flex">
                                    <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                    </i>
                                </span>
                                <span class="kt-accordion-active:inline-flex hidden">
                                    <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                    </i>
                                </span>
                            </button>
                            <div class="kt-accordion-content hidden" id="faq_5_content">
                                <div class="text-secondary-foreground text-base pb-4">
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                        <div class="kt-accordion-item not-last:border-b border-b-border" data-kt-accordion-item="true">
                            <button aria-controls="faq_6_content" class="kt-accordion-toggle py-4"
                                data-kt-accordion-toggle="#faq_6_content">
                                <span class="text-base text-mono">
                                    Can I add extra features to my current plan?
                                </span>
                                <span class="kt-accordion-active:hidden inline-flex">
                                    <i class="ki-filled ki-plus text-muted-foreground text-sm">
                                    </i>
                                </span>
                                <span class="kt-accordion-active:inline-flex hidden">
                                    <i class="ki-filled ki-minus text-muted-foreground text-sm">
                                    </i>
                                </span>
                            </button>
                            <div class="kt-accordion-content hidden" id="faq_6_content">
                                <div class="text-secondary-foreground text-base pb-4">
                                    Metronic embraces flexible licensing options that empower you to choose the perfect fit
                                    for your project's needs and budget. Understanding the factors influencing each plan's
                                    pricing helps you make an informed decision
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid lg:grid-cols-2 gap-5 lg:gap-7.5">
                <div class="kt-card">
                    <div class="kt-card-content px-10 py-7.5 lg:pr-12.5">
                        <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                            <div class="flex flex-col items-start gap-3">
                                <h2 class="text-xl font-medium text-mono">
                                    Questions ?
                                </h2>
                                <p class="text-sm text-foreground leading-5.5 mb-2.5">
                                    Visit our Help Center for detailed assistance on billing, payments, and subscriptions.
                                </p>
                            </div>
                            <img alt="image" class="dark:hidden max-h-[150px]"
                                src="assets/media/illustrations/29.svg" />
                            <img alt="image" class="light:hidden max-h-[150px]"
                                src="assets/media/illustrations/29-dark.svg" />
                        </div>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a class="kt-link kt-link-underlined kt-link-dashed" href="">
                            Go to Help Center
                        </a>
                    </div>
                </div>
                <div class="kt-card">
                    <div class="kt-card-content px-10 py-7.5 lg:pr-12.5">
                        <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-10">
                            <div class="flex flex-col items-start gap-3">
                                <h2 class="text-xl font-medium text-mono">
                                    Contact Support
                                </h2>
                                <p class="text-sm text-foreground leading-5.5 mb-2.5">
                                    Need assistance? Contact our support team for prompt, personalized help your queries &
                                    concerns.
                                </p>
                            </div>
                            <img alt="image" class="dark:hidden max-h-[150px]"
                                src="assets/media/illustrations/31.svg" />
                            <img alt="image" class="light:hidden max-h-[150px]"
                                src="assets/media/illustrations/31-dark.svg" />
                        </div>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a class="kt-link kt-link-underlined kt-link-dashed"
                            href="https://devs.keenthemes.com/unresolved">
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
