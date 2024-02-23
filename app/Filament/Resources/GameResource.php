<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Models\Category;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    protected static ?string $navigationLabel = 'Todos Jogos';

    protected static ?string $modelLabel = 'Jogos';

    protected static ?string $navigationGroup = 'Meus Jogos';

    protected static ?string $slug = 'meus-jogos';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 1;

    /**
     * @return string|null
     */
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string|array|null
     */
    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 5 ? 'success' : 'warning'; // TODO: Change the autogenerated stub
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Games')
                    ->description('Cadastrando um jogo')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->label('Categoria')
                            ->placeholder('Selecione uma categoria')
                            ->relationship(name: 'category', titleAttribute: 'name')
                            ->options(
                                fn($get) => Category::query()
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->preload()
                            ->live()
//                            ->afterStateUpdated(function($set) {
//                                $set('category_id', null);
//                            })
                           ->columnSpanFull(),
                        Forms\Components\TextInput::make('name')
                            ->label('Nome')
                            ->placeholder('Digite o nome do jogo')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('uuid')
                            ->label('UUID')
                            ->placeholder('Digite o UUID do jogo')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('type')
                            ->label('Tipo')
                            ->placeholder('Digite o tipo do jogo')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('provider')
                                    ->label('Provedor')
                                    ->placeholder('Digite o provedor do jogo')
                                    ->required()
                                    ->maxLength(50),
                                Forms\Components\Select::make('provider_service')
                                    ->label('Serviço Provedor')
                                    ->options([
                                        'slotegrator' => 'Slotegrator'
                                    ])
                            ])->columns(2),

                        Forms\Components\FileUpload::make('image')
                            ->label('Imagem')
                            ->placeholder('Carregue a imagem do jogo')
                            ->image()
                            ->columnSpanFull()
                            ->required(),
                        Forms\Components\TextInput::make('technology')
                            ->label('Tecnologia')
                            ->columnSpanFull()
                            ->required(),
                        Forms\Components\Toggle::make('has_lobby')
                            ->required(),
                        Forms\Components\Toggle::make('is_mobile')
                            ->required(),
                        Forms\Components\Toggle::make('has_freespins')
                            ->required(),
                        Forms\Components\Toggle::make('has_tables')
                            ->required(),
                        Forms\Components\Toggle::make('active')
                            ->default(true)
                            ->required(),
                    ])->columns(2)
            ]);
    }

    /**
     * @param Table $table
     * @return Table
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uuid')
                    ->label('UUID')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provider')
                    ->searchable(),
                Tables\Columns\IconColumn::make('technology')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_lobby')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_mobile')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_freespins')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_tables')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->boolean(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('Category')
                    ->relationship('category', 'name')
                    ->label('Selecione uma categoria')
                    ->indicator('Categoria'),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')->label('Data Inicial'),
                        DatePicker::make('created_until')->label('Data Final'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'Criação Inicial ' . Carbon::parse($data['created_from'])->toFormattedDateString();
                        }

                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Criação Final ' . Carbon::parse($data['created_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),
                Tables\Filters\SelectFilter::make('provider')
                    ->label('Provedor')
                    ->options([
                        'Evoplay' => 'Evoplay',
                        'PGSoft' => 'PGSoft',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('Ativar')
                    ->icon('heroicon-m-check')
                    ->requiresConfirmation()
                    ->action(function($records) {
                        return $records->each->update(['active' => 1]);
                    }),
                Tables\Actions\BulkAction::make('Desativar')
                    ->icon('heroicon-m-x-circle')
                    ->requiresConfirmation()
                    ->action(function($records) {
                        return $records->each(function($record) {
                            $id = $record->id;
                            Game::where('id', $id)->update(['active' => 0]);
                        });
                    }),
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
