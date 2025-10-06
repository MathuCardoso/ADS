#include <stdio.h>

int main()
{
    float tamanhoArq, velocConex, tempo;

    printf("Qual o tamanho do arquivo (em bits)?\n");
    scanf("%f", &tamanhoArq);

    printf("Qual a velocidade da conexao (em bits por segundo)?\n");
    scanf("%f", &velocConex);

    tempo = tamanhoArq / velocConex;

    printf("O tempo necessario para realizar o download e de %f segundos", tempo);

    return 0;
}
