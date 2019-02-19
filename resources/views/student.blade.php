<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <div class="row">
                    <div class="col-2">
                        <img src="https://i.imgur.com/QfPBOXZ.png" alt="">
                    </div>
                    <div class="col-7">
                        <div class="info">
                            <p class="first">Entidade Beneficente Betel</p>
                            <p class="sec">Rua Ibituba, nº 6 - Mangabeira - Feira de Santana - BA</p>
                            <p class="sec">Fone: (75) 3626-6835/982823820/982850237</p>
                            <p class="sec last">Ações do amor de Deus por uma vida com mais oportunidade</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="photo">
                            <p>Foto 3 x 4</p>
                        </div>
                    </div>
                </div>
                <p>
                    <h2>Ficha de Cadastro</h2>
                    <h3>Aluno</h3>
                </p>
            </header>
            <div class="row">
                <div class="col-md">
                    <p>
                        <span class="detail">Nome: <span>{{$student->name}}</span></span>
                    </p>
                </div>
                <div class="col-md">
                    <p>
                        <span class="detail">Data de nascimento: <span>{{$student->birthdate}}</span></span>
                    </p>
                </div>
                <div class="col-md">
                    <p>
                        <span class="detail">Idade: <span>{{$student->age}}</span></span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Pai: <span>{{$student->father}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Profissão: <span>{{$student->job_father}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Religião: <span>{{$student->religion_father}}</span></span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Mãe: <span>{{$student->mother}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Profissão: <span>{{$student->job_mother}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Religião: <span>{{$student->religion_mother}}</span></span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Endereço: <span>{{$student->address}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Telefone: <span>{{$student->phone}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Mora com: <span>{{$student->lives_with}}</span></span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Escola: <span>{{$student->school}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Série: <span>{{$student->grade}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">É repetente:
                            @if ($student->repeat_student)
                                <span>Sim</span>
                            @else
                                <span>Não</span>
                            @endif
                        </span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Responsável pela inscrição: <span>{{$student->responsible}}</span></span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">RG do responsável: <span>{{$student->responsible_rg}}</span></span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Já é aluno do projeto:
                            @if ($student->prev_student)
                                <span>Sim</span>
                            @else
                                <span>Não</span>
                            @endif
                        </span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Remédio para febre: <span>{{$student->fever_drug}}</span></span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Problema de saúde:
                            @if ($student->health_issue)
                                <span>{{$student->which_health_issue}}</span>
                            @else
                                <span>Não possui</span>
                            @endif
                        </span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Medicamentos utilizados:
                            @if ($student->use_medicine)
                                <span>{{$student->which_medicine}}</span>
                            @else
                                <span>Não utiliza</span>
                            @endif
                        </span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Recomendações da família:
                            <span>{{$student->family_reco}}</span>
                        </span>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <span class="detail">Quem busca:
                            @if ($student->home_alone)
                                <span>Retorna sozinho(a)</span>
                            @else
                                <span>{{$student->who_takes_home}}</span>
                            @endif
                        </span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p>
                        <span class="detail">Data do cadastro:
                            <span>{{\Carbon\Carbon::parse($student->created_at)->format('d/m/Y')}}</span>
                        </span>
                    </p>
                </div>
            </div>

            <div class="footer">
                <div class="row">
                    <div class="col">
                        <p>Feira de Santana, {{$today}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col sign">
                        <p>___________________________________________</p>
                        <p>Assinatura do responsável</p>
                    </div>
                </div>
            </div>
        </div>

        <style>
            @media print {
                @page {
                    margin-top: 0;
                    margin-bottom: 0;
                }
            }

            header {
                width: 100%;
                text-align: center;
                margin-top: 30px;
            }

            img {
                width: 3cm;
                margin-top: 50%;
            }

            .info {
                font-size: 0.9em;
                margin-top: 30px;
            }

            .first {
                font-weight: bold;
            }

            .sec {
                line-height: 4px;
            }

            .last {
                font-size: 0.8em;
                font-style: italic;
            }

            .photo {
                border: 1px solid #CCC;
                border-radius: 5px;
                width: 3cm;
                height: 4cm;
            }

            .photo p {
                margin-top: 50%;
                color: #BBB;
            }

            .footer {
                text-align: center;
                margin-top: 50px;
            }

            .sign {
                margin-top: 30px;
                line-height: 3px;
            }

            .detail {
                font-weight: bold;
                display: inline-block;
            }

            .detail span {
                font-weight: normal;
            }
        </style>
    </body>
</html>