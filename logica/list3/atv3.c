#include <ctype.h>
#include <stdio.h>

int main()
{
    char estadoCivil;

    printf("Qual e seu estado civil? [S, C, V, D]\n");
    scanf("%c", &estadoCivil);

    estadoCivil = toupper(estadoCivil);

    while (estadoCivil != 'S' && estadoCivil != 'C' && estadoCivil != 'V' && estadoCivil != 'D') {

        printf("Sua resposta deve ser S, C, V ou D.\n");
        scanf(" %c", &estadoCivil);

        estadoCivil = toupper(estadoCivil);

    if (estadoCivil == 'S') {

        printf("Voce esta solteiro(a)!\n");

    } else if(estadoCivil == 'C') {

        printf("Voce e casado(a)!\n");

    } else if(estadoCivil == 'V') {
        
        printf("Voce e viuvo(a)!\n");

    } else if(estadoCivil == 'D') {
        
        printf("Voce e divorciado(a)!\n");
    }
}

    
    
    return 0;
}
