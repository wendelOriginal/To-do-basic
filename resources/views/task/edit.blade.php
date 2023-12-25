<x-layout page="B7web Todo: login" >

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <section class="create_task_section">
        <h1>Editar tarefa</h1>

        <form  action="{{route('task.save_edit')}}" method="POST">
         @csrf()

         <x-form.input name="id" type="hidden" value="{{$task['id']}}"/>
         <x-form.input name="title" type="text" placeholder="Digite o titulo ..." label="Titulo" value="{{$task['title']}}"/>

         <x-form.input name="due_date" type="datetime-local" label="Data da tarefa" value="{{$task['due_date']}}"/>


         <x-form.select name="category_id" label="Categoria">
            <option value="null" selected disabled>selecione a categoria</option>

            @foreach ($categories as $category)
            <option value="{{$category->id}}"
                @if ($category->id == $task['category_id'])
                    selected
                @endif

                >{{$category->title}}</option>

            @endforeach

         </x-form.select>


         <x-form.checker name="is_done" label="Tarefa finlizada ?" checked="{{$task['is_done']}}"/>


         <x-form.textarea name="description" label="Descrição" placeholder="Digite a descrição ...." value="{{$task['description']}}"/>



         <x-form.btn name="Resetar" type="reset" class="btn" />
         <x-form.btn name="Salvar" type="submit" class="btn btn-primary"/>
        </form>

      </section>




    </x-layout>
