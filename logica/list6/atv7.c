#include <stdio.h>
#include <ctype.h>
int main()
{
    int a = 0, c = 0, f = 0, totalTorcedores = 0;
    char resp;

    do 
    {
        printf("Ola torcedor! Para qual time voce torce?\n");
        printf("[A] - Atletico-MG\n[F] - Foz do Iguacu FC\n[C]Coritiba\n[S] - Sair\n");
        scanf(" %c", &resp);
        resp = toupper(resp);

       if (resp == 'A') {
            a++;
            totalTorcedores++;
        } else if (resp == 'F') {
            f++;
            totalTorcedores++;
        } else if (resp == 'C') {
            c++;
            totalTorcedores++;
        } else if (resp != 'S') {
            printf("Resposta incorreta. Tente novamente.\n\n");
        }

    } while (resp != 'S');

    printf("Estes sao os dados da pesquisa:\n");
    printf("Total de torcedores intrevistados: %d\n", totalTorcedores);
    printf("Total de torcedores do Foz do Iguacu FC: %d\n", f);
    printf("Total de torcedores do Atletico-MG: %d\n", a);
    printf("Total de torcedores do Coritiba: %d\n", c);
    



    return 0;
}
