<x-layout>

<x-slot:btn>
    <a href="{{route('task.create')}}" class="btn btn-primary">Criar Tarefa</a>
    <a href="{{route('logout.user')}}" class="btn btn-primary">Logout</a>
</x-slot:btn>



    <section class="graph">

        <div class="graph_header">

            <h3 class="title_header">Progresso do Dia</h3>
            <div class="lineHeader"></div>
             <div class="graph_header-data">

                <a href="{{route('home',$data['prev_date_btn'])}}">

                    <img src="/assets/images/icon-prev.png" alt="">
                </a>

                    {{$data['date_as_string']}}
                    <a href="{{route('home',$data['next_date_btn'])}}">
                <img src="/assets/images/icon-next.png" alt="">
            </a>
             </div>
        </div>
        <div class="graph_header-subtitle">Tarefa: 3/6</div>

        <div class="graph_placeholde">

        </div>

        <div class="graph_header_tasks_left">
            <img src="/assets/images/icon-info.png" alt="">
            Restam 3 tarefas a serem realizadas
        </div>
    </section>
    <section class="list">

        <div class="list-header">
            <select name="" id="" class="list_header-select" onchange="taskSelect(this)">
                <option value="show-all">Todas as tarefas</option>
                <option value="show-pending">Tarefas pendentes</option>
                <option value="show-done">Tarefas concluidas</option>
            </select>


        </div>
        <div class="task_list">


            @foreach ($data['task'] as $task)

            <x-tasks :data=$task/>

            @endforeach




        </div>

    </section>

    <script>
        function taskSelect(item)
        {
            showItens()

            if(item.value == 'show-pending'){
                let input = document.querySelectorAll('.task').forEach(element => {
                    if(element.children[0].children[0].checked == true){
                        element.style.display = "none";

                    }
                });




            }else if(item.value == 'show-done'){

                showItens()
                let input = document.querySelectorAll('.task').forEach(element => {
                    if(element.children[0].children[0].checked == false){
                        element.style.display = "none";

                    }
                })

            }else{
                showItens()
            }
        }


        function showItens()
        {
            let task = document.querySelectorAll('.task').forEach(element => {
                element.style.display = "flex";
            })
        }


        async function checkerInput(obj)
        {
            let is_done = obj.checked;
            let id = obj.dataset.id;
            let url = '{{route('checker.box')}}';

            let resultJson  =  await fetch(url,{
                    method: 'POST',
                    headers: {
                        'Content-type':'application/json',
                        'accept': 'application/json'
            },
                body: JSON.stringify({is_done, id, _token: '{{csrf_token()}}'}),
        });

            let result = await resultJson.json();
            if(result.success){
                alert('Tarefa atualizada');
            }else{
               obj.checked = !obj.checked;
            }

        }

    </script>

</x-layout>
