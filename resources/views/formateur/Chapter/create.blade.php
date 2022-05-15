@extends('layout')
@section('content')
    <div class="container m-5 ">
        <div class="row justify-content-center">
            <div class="w-full">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h5>Creat new chapitre</h5>
                    </div>
                    <div class="card-body">
                        <div class="row" x-data="quizzer">
                            <div class="col-4 border-end">
                                <form action="{{ route('chapter.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="cours_id" value="1">
                                    <input type="hidden" name="quiz" x-model="JSON.stringify(quizzes)">
                                    <div class="mb-3">
                                        <label for="training name" class="form-label">Chapter name</label>
                                        <input type="text" class="form-control" name="intitule"
                                            value="{{ old('intitule') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" value="save">Save</button>
                                </form>
                            </div>
                            <div class="col-4 border-end">
                                <h2 class="fs-3">Quize</h2>
                                <hr>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Question</label>
                                    <input x-model="quiz.question" type="text" class="form-control" name="intitule">
                                </div>
                                <div class="d-flex gap-2 mb-3">
                                    <div>
                                        <label for="description" class="form-label">Reponse 1</label>
                                        <input x-model="quiz.r1.val" type="text" class="form-control" name="intitule">
                                    </div>
                                    <div class="mt-4 d-flex align-items-center gap-1">
                                        <input x-model="quiz.r1.vrai" type="checkbox" name="intitule">
                                        <label for="description">Vrai</label>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mb-3">
                                    <div>
                                        <label for="description" class="form-label">Reponse 2</label>
                                        <input x-model="quiz.r2.val" type="text" class="form-control" name="intitule">
                                    </div>
                                    <div class="mt-4 d-flex align-items-center gap-1">
                                        <input x-model="quiz.r2.vrai" type="checkbox" name="intitule">
                                        <label for="description">Vrai</label>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mb-3">
                                    <div>
                                        <label for="description" class="form-label">Reponse 3</label>
                                        <input x-model="quiz.r3.val" type="text" class="form-control" name="intitule">
                                    </div>
                                    <div class="mt-4 d-flex align-items-center gap-1">
                                        <input x-model="quiz.r3.vrai" type="checkbox" name="intitule">
                                        <label for="description">Vrai</label>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mb-3">
                                    <div>
                                        <label for="description" class="form-label">Reponse 4</label>
                                        <input x-model="quiz.r4.val" type="text" class="form-control" name="intitule">
                                    </div>
                                    <div class="mt-4 d-flex align-items-center gap-1">
                                        <input x-model="quiz.r4.vrai" type="checkbox" name="intitule">
                                        <label for="description">Vrai</label>
                                    </div>
                                </div>
                                <button @click.prevent="addQuiz" type="button" class="btn btn-primary"
                                    value="save">Ajouter</button>
                            </div>
                            <div class="col-4">
                                <template x-for="(quiz, index) in quizzes" :key="index">
                                    <div class="d-block px-2 py-1 rounded border mb-2">
                                        <span class="d-block" x-text="quiz.question"></span>
                                        <div class="mt-3">
                                            <div class="d-flex gap-1">
                                                <span class="fw-bold mr-1" x-text="quiz.r1.val"></span>
                                                <span class="fst-italic" x-text="quiz.r1.vrai"></span>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <span class="fw-bold mr-1" x-text="quiz.r2.val"></span>
                                                <span class="fst-italic" x-text="quiz.r2.vrai"></span>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <span class="fw-bold mr-1" x-text="quiz.r3.val"></span>
                                                <span class="fst-italic" x-text="quiz.r3.vrai"></span>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <span class="fw-bold mr-1" x-text="quiz.r4.val"></span>
                                                <span class="fst-italic" x-text="quiz.r4.vrai"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script defer>
        document.addEventListener("alpine:init", () => {
            Alpine.data("quizzer", () => ({
                quiz: {
                    question: "",
                    r1: {
                        val: "",
                        vrai: false,
                    },
                    r2: {
                        val: "",
                        vrai: false,
                    },
                    r3: {
                        val: "",
                        vrai: false,
                    },
                    r4: {
                        val: "",
                        vrai: false,
                    },
                },
                quizzes: [],
                addQuiz() {
                    this.quizzes.push(this.quiz);
                    this.quiz = {
                        question: "",
                        r1: {
                            val: "",
                            vrai: false,
                        },
                        r2: {
                            val: "",
                            vrai: false,
                        },
                        r3: {
                            val: "",
                            vrai: false,
                        },
                        r4: {
                            val: "",
                            vrai: false,
                        },
                    }
                }
            }));
        });
    </script>
@endsection
