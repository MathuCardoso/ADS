#include <stdio.h>
#include <locale.h>
#include <ctype.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");

    setlocale(LC_ALL, ".utf8");
    
    char resp;

    printf("O animal é um MAMÍFERO?\n");
    scanf(" %c", &resp);
    resp = toupper(resp);

    //MAMIFERO
    if (resp == 'S')
    {
        printf("Seu animal é um QUADRUPIDE?\n");
        scanf(" %c", &resp);
        resp = toupper(resp);

        //QUADRUPIDE
        if (resp == 'S')
        {
            printf("Seu animal é CARNÍVERO?\n");
            scanf(" %c", &resp);
            resp = toupper(resp);

            //CARNÍVORO
            if (resp == 'S')
            {
                printf("Seu animal é um LEÃO! Obrigado por jogar :)");
            } else if(resp == 'N') {
                printf("Seu animal é HERBÍVORO?\n");
                scanf(" %c", &resp);
                resp = toupper(resp);
                //HERBÍVORO
                if(resp == 'S') {
                    printf("Seu animal é um CAVALO! Obrigado por jogar :)");
                } else if(resp == 'N') {
                    printf("Animal não encontrado :( Tente novamente.");
                }
            }

        } else if(resp == 'N') {
            printf("Seu animal é BÍPEDE?\n");
            scanf(" %c", &resp);
            resp = toupper(resp);

            //BÍPEDE
            if(resp == 'S') {

                printf("Seu animal é ONÍVORO?\n");
                scanf(" %c", &resp);
                resp = toupper(resp);

                //ONÍVORO
                if(resp == 'S') {
                    printf("Seu animal é um HOMEM! Obrigado por jogar :)");
                } else if(resp == 'N') {
                    printf("Seu animal é FRUTIFERO?\n");
                    scanf(" %c", &resp);
                resp = toupper(resp);
                    //FRUTÍFERO
                    if(resp == 'S') {
                        printf("Seu animal é um MACACO! Obrigado por jogar :)");
                    } else if(resp == 'N') {
                        printf("Animal não encontrado :( Tente novamente.");
                    }
                }

            } else if(resp == 'N') {
                printf("Seu animal é VOADOR?\n");
                scanf(" %c", &resp);
                resp = toupper(resp);

                //VOADOR
                if (resp == 'S')
                {
                    printf("Seu animal é um MORCEGO!\nObrigado por jogar :)");
                } else if(resp == 'N') {
                    printf("Seu animal é AQUÁTICO?\n");
                    scanf(" %c", &resp);
                    resp = toupper(resp);

                    //AQUÁTICO
                    if(resp == 'S') {
                        printf("Seu animal é uma BALEIA!\nObrigado por jogar. :)");
                    } else if(resp == 'N') {
                        printf("Animal não encontrado :( Tente novamente.");
                    }
                }
                
            }
        }

    } 
    else if(resp == 'N'){
        printf("Seu animal é uma AVE?\n");
        scanf(" %c", &resp);
        resp = toupper(resp);

        //AVE
        if(resp == 'S') {
            printf("Seu animal é NÃO-VOADOR?\n");
            scanf(" %c", &resp);
            resp = toupper(resp);

            //NÃO-VOADORES
            if(resp == 'S') {
                printf("Seu animal é TROPICAL?\n");
                scanf(" %c", &resp);
                resp = toupper(resp);

                //TROPICAL
                if (resp == 'S')
                {
                    printf("Seu animal é um AVESTRUZ! Obrigado por jogar :)");
                }
                else if(resp == 'N') {
                    printf("Seu animal é POLAR?\n");
                    scanf(" %c", &resp);
                    resp = toupper(resp);

                    //POLAR
                    if(resp == 'S') {
                        printf("Seu animal é um PINGUIM! Obrigado por jogar :)");
                    } else if(resp == 'N') {
                        printf("Animal não encontrado :( Tente novamente.");
                    }
                }
                
            }
            
            else if(resp == 'N') {
                printf("Seu animal é NADADOR?\n");
                scanf(" %c", &resp);
                resp = toupper(resp);

                //NADADOR
                if(resp == 'S') {
                    printf("Seu animal é um PATO! Obrigado por jogar :)");
                }
                else if(resp == 'N') {
                    printf("Seu animal é DE RAPINA?\n");
                    scanf(" %c", &resp);
                    resp = toupper(resp);

                    //DE RAPINA
                    if(resp == 'S') {
                        printf("Seu animal é uma ÁGUIA! Obrigado por jogar :)");
                    }
                    else if(resp == 'N') {
                        printf("Animal não encontrado :( Tente novamente.");
                    }
                }
            }

        } else if(resp == 'N'){
            printf("Seu animal é um RÉPTIL?\n");
            scanf(" %c", &resp);
            resp = toupper(resp);

            //RÉPTIL
            if(resp == 'S') {
                printf("Seu animal é com CASCO?\n");
                scanf(" %c", &resp);
                resp = toupper(resp);

                //COM CASCO
                if(resp == 'S') {
                    printf("Seu animal é uma TARTARUGA! Obrigado por jogar :)");

                } else if(resp == 'N') {
                    printf("Seu animal é CARNÍVORO?\n");
                    scanf(" %c", &resp);
                    resp = toupper(resp);

                    //CARNÍVOROS
                    if(resp == 'S') {
                        printf("Seu animal é um CROCODILO! Obrigado por jogar :)");
                    }
                    else if(resp == 'N') {
                        printf("Seu animal é SEM PATAS?\n");
                        scanf(" %c", &resp);
                        resp = toupper(resp);

                        //SEM PATAS
                        if(resp == 'S') {
                            printf("Seu animal é uma COBRA! Obrigado por jogar :)");
                        }
                        else if(resp == 'N') {
                            printf("Animal não encontrado :( Tente novamente.");
                        }
                    }
                }

            } else{
                printf("O animal aqui é voce. Tente novamente :)");
            }
    }
}   
    return 0;
}