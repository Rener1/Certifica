{{-- @foreach($certificados as $certificado)
    <div class="row linha-table d-flex align-items-center justify-content-start">
        <div class="col-3 titulo-span text-center"><span class="spacing-col">{{$certificado->atividade->acao->tipo_natureza->natureza->descricao}}</span></div>
        <div class="col-2 text-center"><span>{{$certificado->atividade->acao->tipo_natureza->descricao}}</span></div>
        <div class="col-2 text-center titulo-span"><span>{{$certificado->atividade->acao->titulo}}</span></div>
        <div class="col-2 text-center"><span>{{$certificado->atividade->descricao}}</span></div>
        <div class="col-2 d-flex align-items-center justify-content-evenly">
            <span> <a href="{{route('participante.ver_certificado', ['participante_id'=>$certificado->participante($certificado->atividade_id, $certificado->cpf_participante)->id])}}" target="blank">
                        <img src="/images/acoes/listView/certificado.svg" alt="Visualizar">
                    </a>
            </span>
        </div>
    </div>
@endforeach --}}
@foreach($acoes as $acao)
    <div class="row linha-table d-flex align-items-center justify-content-start">
        <div class="col-2 text-center titulo-span" title="{{$acao->titulo}}"><span>{{$acao->titulo}}</span></div>
        <div class="col-2 titulo-span text-center"><span class="spacing-col">{{$acao->tipo_natureza->natureza->descricao}}</span></div>
        <div class="col-2 text-center titulo-span" title="{{$acao->tipo_natureza->descricao}}"><span>{{$acao->tipo_natureza->descricao}}</span></div>
        <div class="col-2 text-center titulo-span" title="{{$acao->nome_atividades}}">  <a href="{{route('relatorios.atividades', ['acao_id'=>$acao->id])}}" target="blank" ><img src="/images/atividades/participantes.svg" alt=""></a></div>
        <div class="col-1 text-center"><span>{{$acao->total}}</span></div>
        <div class="col-1 text-center">
            <span> <a href="{{route('certificados.download', ['acao_id'=>$acao->id])}}" target="blank">
                        <img src="/images/acoes/listView/zipcertificados.svg" alt="Visualizar" title="Baixar Certificados">
                    </a>
            </span>
        </div>
        <div class="col-2 text-center">
            <span>
                <a class="btn" data-bs-toggle="modal" data-bs-target="#modal-info{{ $acao->id }}"><img
                        src="/images/acoes/listView/eye.svg" alt="" title="Estatísticas de Certificados"></a>
            </span>
        </div>
    </div>

    <div class="modal fade" id="modal-info{{ $acao->id }}">
        <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #972E3F; color: white;">
                    <h5 class="modal-title"><b>Estatísticas de Certificados</b></h5>
                </div>
                <div class="modal-body">
                    @if (count($acao->atividades))
                        <div class="row justify-content-center">
                            @foreach ($acao->atividades as $atividade)
                                <?php
                                    $atividade->certificados = $atividade->certificados()->count();
                                ?>

                                <span><b>{{ $atividade->descricao }}:</b> {{ $atividade->certificados }} certificado(s)</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
<script>
    $(".total").html("<strong class='d-flex justify-content-sm-end mb-5' style='font-size: 20px; margin-right: 20px;'>Total de certificados: {{$total}}</strong>");
</script>
