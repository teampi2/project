import * as React from 'react'

interface SchoolsContextProps {
  schools: ISchool[]
  currentSchool: ISchool | null
  setCurrentSchool: React.Dispatch<React.SetStateAction<ISchool | null>>
  openCreateDialog: boolean
  openUpdateDialog: boolean
  handleToggleCreateDialog: () => void
  handleToggleUpdateDialog: () => void
  handleCreateSchool: (school: ICreateSchoolData) => void
  handleUpdateSchool: (
    id: number,
    updatedData: Partial<ICreateSchoolData>
  ) => void
  handleDeleteSchool: (id: number) => void
  handleFindSchool: (id: number) => ISchool | null
}

export const SchoolsContext = React.createContext({} as SchoolsContextProps)
