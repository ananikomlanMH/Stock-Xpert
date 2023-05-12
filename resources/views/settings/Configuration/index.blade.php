@extends('layouts.layout')

@section('title', 'Configuration')

@php
    $i = 0;
    $form = (new \App\Helpers\FormHelper\Form());
    $form->getInput("number", "number-format", "margin_top", "Margin Top", null, $configuration->margin_top , "noEmpty", 10, "data-max=100");
    $form->getInput("number", "number-format", "margin_bottom", "Margin Bottom", null, $configuration->margin_bottom , "noEmpty", 10, "data-max=100");
    $form->getInputFile('header', 'Header', false);
    $form->getInputFile('footer', 'Footer', false);
@endphp
@section('content')
    <div class="link">Configuration</div>

    <div class="form-content mt-25">
        <div class="d-flex">
            <form action="{{ \App\Components\Router\Router::route('configuration.edit') }}" method="post" style="width: 30%;"
                  class="custom__form" enctype="multipart/form-data">
                {!! $form->render() !!}
                <div class="">
                    <button type="submit" class="btn-primary">Enregister<i class="fi-rr-disk"></i></button>
                </div>
            </form>
            <div style="margin-left: 30px; width: 70%;">
                <p style="font-weight:500;" class="mb-5">Entête:</p>
                <div class="img__box" style="padding: 20px;">
                    <img style="max-width: 100%"
                         data-img="@if ($configuration->header === null)
                         {{ '/vendors/images/header.png' }}
                         @else
                         {{ '/vendors/images/uploads/'.$configuration->header }}
                         @endif"
                         src="@if ($configuration->header === null)
                         {{ '/vendors/images/header.png' }}
                         @else
                         {{ '/vendors/images/uploads/'.$configuration->header }}
                         @endif"
                         alt="header" id="load__previewImg_header" class="previewImg">
                </div>
                <p style="font-weight:500;" class="mb-5 mt-30">Pied de page:</p>
                <div class="img__box" style="padding: 20px;">
                    <img style="max-width: 100%"
                         data-img="@if ($configuration->footer === null)
                         {{ '/vendors/images/footer.png' }}
                         @else
                         {{ '/vendors/images/uploads/'.$configuration->footer }}
                         @endif"
                         src="@if ($configuration->footer === null)
                         {{ '/vendors/images/footer.png' }}
                         @else
                         {{ '/vendors/images/uploads/'.$configuration->footer }}
                         @endif"
                         alt="footer" id="load__previewImg_footer" class="previewImg">
                </div>
            </div>
        </div>
    </div>
@endsection