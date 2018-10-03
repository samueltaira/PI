
<!-- Modal de registro de Cliente -->

<div class="modal fade" id="registroClienteModal" tabindex="-1" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>

                            <div class="col-md-6">
                                <label for="documento" class="col-form-label">Documento:</label>
                                <input type="text" maxlength="11" placeholder="Ex.: xxxxxxxxxxx"
                                       class="form-control" id="documento" name="documento">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-8">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="col-md-4">
                                <label for="telefone" class="col-form-label">Telefone:</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-8">
                                <label for="cidade" class="col-form-label">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" name="cidade">
                            </div>

                            <div class="col-md-4">
                                <label for="estado" class="col-form-label">Estado:</label>
                                <input type="text" maxlength="11" class="form-control" id="estado"
                                       name="estado">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar alterações</button>
            </div>
        </div>
    </div>
</div>

