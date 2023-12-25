<x-layout page="B7web Todo: login" >

    <x-slot:btn>
        <a href="{{route('login')}}" class="btn btn-primary">Já possui cadastro - Entrar</a>
    </x-slot:btn>


    <section class="create_task_section">
        <h1>Registrar-se</h1>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
            @endforeach

        </ul>
        @endif

        <form  action="{{route('register.user')}}" method="POST">
         @csrf()

         <x-form.input name="name" type="text" placeholder="Digite seu nome..." label="Nome" />

         <x-form.input name="email" type="email" label="Digite seu e-mail" placeholder="Digite eu e-mail..."/>

         <x-form.input name="password" type="password" label="Digite sua senha" placeholder="Digite sua senha..."/>

         <x-form.input name="password_confirmation" type="password" label="Digite novamente sua senha" placeholder="Repita sua senha..."/>



         <x-form.btn name="Apagar" type="reset" class="btn" />
         <x-form.btn name="Salvar" type="submit" class="btn btn-primary"/>
        </form>

      </section>


    </x-layout>
