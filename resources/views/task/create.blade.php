<x-layout page="B7web Todo: Criar tarefa" >

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

  <section class="create_task_section">
    <h1>Criar tarefa</h1>

    <form  action="{{route('create.task')}}" method="POST">
     @csrf()
     <x-form.input name="title" type="text" placeholder="Digite o titulo ..." label="Titulo"/>

     <x-form.input name="due_date" type="datetime-local" label="Data da tarefa"/>


     <x-form.select name="category_id" label="Categoria">
        <option value="null" selected disabled>selecione a categoria</option>

        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>

        @endforeach
     </x-form.select>


     <x-form.textarea name="description" label="Descrição" placeholder="Digite a descrição ...."/>

    <x-form.btn name="Resetar" type="reset" class="btn" />
     <x-form.btn name="Salvar" type="submit" class="btn btn-primary"/>
    </form>

  </section>

 </x-layout>
