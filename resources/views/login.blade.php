<x-layout page="B7web Todo: login" >

<x-slot:btn>
    <a href="{{route('register')}}" class="btn btn-primary">Cadastre-se</a>
</x-slot:btn>


<section class="create_task_section">
    <h1>Autenticação</h1>

    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
        <li>{{$erro}}</li>
        @endforeach

    </ul>
    @endif

    <form  action="{{route('login.user')}}" method="POST">
     @csrf()

     <x-form.input name="email" type="email" label="Digite seu e-mail" placeholder="Digite eu e-mail..."/>

     <x-form.input name="password" type="password" label="Digite sua senha" placeholder="Digite sua senha..."/>




     <x-form.btn name="Limpar" type="reset" class="btn" />
     <x-form.btn name="Entrar" type="submit" class="btn btn-primary"/>
    </form>

  </section>

</x-layout>
