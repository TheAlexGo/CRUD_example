<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body class="bg-light">

<div class="container">
    <h1>@yield('title')</h1>
    <main>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endisset
        @if(session('danger'))
            <div class="alert alert-danger">{{ session('danger') }}</div>
        @endisset

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
        crossorigin="anonymous"></script>
<script>
    const $addTagButton = document.querySelector('.addTag');

    function deleteTag(button) {
        const tagId = button.dataset.tagid;
        const $tagBlock = document.querySelector('#' + tagId);
        $tagBlock.parentNode.remove();
    }

    $addTagButton.onclick = () => {
        const $tagsBlock = document.querySelector('.tags');
        const $newTagBlock = document.createElement('div');
        const getRandom = (Math.random() * (1000 - 7) + 7).toString().replace('.', '-');
        $newTagBlock.innerHTML = `<x-forms.tags.input id="${getRandom}" />`;
        $tagsBlock.appendChild($newTagBlock);
    };

    function focusTag(input) {
        fetch('{{ route('tag.get') }}')
            .then((r) => {
                if (r.ok) {
                    return r.json();
                } else {
                    throw new Error(`Ошибка: ${r.statusText}`);
                }
            })
            .then((r) => {
                if(document.querySelector('.availableTags')) {
                    document.querySelectorAll('.availableTags').forEach(el => el.remove());
                }
                const $divMain = document.createElement('ul');
                $divMain.classList.add('availableTags');
                r.forEach((el) => {
                    const $li = document.createElement('li');
                    $li.classList.add('availableTag');
                    $li.id = el.id;
                    $li.innerHTML = el.text;
                    $li.onclick = (e) => {
                        input.value = e.target.textContent;
                    }
                    $divMain.appendChild($li);
                });
                if(!input.value) input.parentNode.appendChild($divMain);
            });
    }

    document.addEventListener('click', (e) => {
        if (!e.target.classList.contains('tagInput')) {
            document.querySelector('.availableTags')?.remove();
        }
    })
</script>
</body>
</html>
