#include <stdio.h>
#include <stdlib.h>

typedef struct No
{
    int valor;
    struct No *prox;
} No;

No *criaNo(int valor)
{
    No *novo = (No *)malloc(sizeof(No));
    if (novo == NULL)
    {
        printf("\nErro na alocação de memoria.\n");
        exit(1);
    }
    novo->valor = valor;
    novo->prox = NULL;
    return novo;
}

void inserirOrdenado(No **inicio, int valor)
{
    No *novo = criaNo(valor);
    No *atual = *inicio;
    No *anterior = NULL;

    while (atual != NULL && atual->valor < valor)
    {
        anterior = atual;
        atual = atual->prox;
    }

    if (anterior == NULL)
    {
        novo->prox = *inicio;
        *inicio = novo;
    }
    else
    {
        anterior->prox = novo;
        novo->prox = atual;
    }
}

void removerElemento(No **inicio, int valor)
{
    No *atual = *inicio;
    No *anterior = NULL;

    while (atual != NULL && atual->valor != valor)
    {
        anterior = atual;
        atual = atual->prox;
    }

    if (atual == NULL)
    {
        printf("\nElemento %d nao encontrado na lista.\n", valor);
        return;
    }

    if (anterior == NULL)
    {
        *inicio = atual->prox;
    }
    else
    {
        anterior->prox = atual->prox;
    }

    free(atual);
    printf("\nElemento %d removido com sucesso.\n", valor);
}

No *buscarElemento(No *inicio, int valor)
{
    while (inicio != NULL)
    {
        if (inicio->valor == valor)
            return inicio;
        inicio = inicio->prox;
    }
    return NULL;
}

void imprimirLista(No *inicio)
{
    if (inicio == NULL)
    {
        printf("\n lista está vazia.\n");
        return;
    }
    printf("Lista: ");
    while (inicio != NULL)
    {
        printf("%d - ", inicio->valor);
        inicio = inicio->prox;
    }
    printf("\n");
}

int contarElementos(No *inicio)
{
    int contador = 0;
    while (inicio != NULL)
    {
        contador++;
        inicio = inicio->prox;
    }
    return contador;
}

void liberarLista(No **inicio)
{
    No *atual = *inicio;
    while (atual != NULL)
    {
        No *prox = atual->prox;
        free(atual);
        atual = prox;
    }
    *inicio = NULL;
}

int main()
{
    No *lista = NULL;
    int opcao, valor;
    No *resultado;

    do
    {
        printf("\n--- MENU ---\n");
        printf("1 - Inserir elemento\n");
        printf("2 - Remover elemento\n");
        printf("3 - Buscar elemento\n");
        printf("4 - Imprimir lista\n");
        printf("5 - Contar elementos\n");
        printf("0 - Sair\n");
        printf("Escolha uma opcao: ");
        scanf("%d", &opcao);

        switch (opcao)
        {
        case 1:
            printf("Digite o valor: ");
            scanf("%d", &valor);
            inserirOrdenado(&lista, valor);
            break;
        case 2:
            printf("Digite o valor: ");
            scanf("%d", &valor);
            removerElemento(&lista, valor);
            break;
        case 3:
            printf("Digite o valor: ");
            scanf("%d", &valor);
            resultado = buscarElemento(lista, valor);
            if (resultado != NULL)
                printf("Elemento %d encontrado no endereco %p.\n", valor, (void *)resultado);
            else
                printf("Elemento %d nao encontrado.\n", valor);
            break;
        case 4:
            imprimirLista(lista);
            break;
        case 5:
            printf("Numero de elementos: %d\n", contarElementos(lista));
            break;
        case 0:
            liberarLista(&lista);
            printf("Saindo...\n");
            break;
        default:
            printf("\nOpcao invalida.\n");
        }
    } while (opcao != 0);

    return 0;
}